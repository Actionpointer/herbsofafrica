<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Currency;
use App\Models\Affiliate;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use App\Http\Traits\StripeTrait;
use App\Http\Traits\FlutterwaveTrait;

class AffiliateController extends Controller
{
    use StripeTrait,FlutterwaveTrait;

    public function __construct(){
        $domain = request()->domain ? request()->domain: request()->root();
        $affiliate = Affiliate::where('username', $domain)->first();
        \abort_if(!$affiliate,404);
    }
    
    public function index()
    {
        dd('we dey here');
        if(auth()->user()->affiliate && auth()->user()->affiliate->account_number){
            return redirect()->route('affiliate.overview');
        }
        $countries = Country::all();
        return view('user.affiliate.register',compact('countries'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'affiliate_username' => ['required', 'string'],
            'affiliate_email' => ['required', 'string','email','max:255'],
            'affiliate_phone' => ['required', 'string', 'max:255'],
            'affiliate_country' => ['required', 'string'],
            // 'chkAgreeTerms' => ['required', '1'],
        ]);
        $affiliate = Affiliate::updateOrCreate(['user_id'=> auth()->id(),'username'=> $request->affiliate_username],['email'=> $request->affiliate_email,'phone'=> $request->affiliate_phone,'country_id'=> $request->affiliate_country]);
        $response = Curl::to('https://api.stripe.com/v1/accounts')
        ->withHeader('Content-Type: application/x-www-form-urlencoded')
        ->withHeader('Authorization: Bearer '.config('services.stripe.secret'))
        ->withData( array('type'=> 'express','country'=> $affiliate->country->iso ,'email' => $affiliate->email))
        ->asJsonResponse()
        ->get();
        dd($response);
        // dd($response);
        if($affiliate->country->iso == "NG"){
            return redirect()->route('affiliate.bank.account');
        }else{
            $account = $this->connectStripe($affiliate);
            if(!$account)
            return redirect()->route('affiliate.index');
            return redirect()->route('affiliate.connect.stripe');
        }
        
    }

    public function stripeOnboarding(){
        $link = $this->accountLink(auth()->user()->affiliate);
        if(!$link){
            return redirect()->route('affiliate.connect.stripe');
        }else return redirect()->to($link);
    }

    public function bankAccountLink(){
        // $banks = $this->banks(auth()->user()->affiliate->country->iso);
        $response = $this->resolveBankAccountByFlutter('058','0051911523');
        dd($response);
        return view('user.affiliate.bank_account',compact('banks'));
    }

    public function storeBankAccount(Request $request){
        $request->validate([
            'bank_code' => ['required', 'string','unique:affiliates,username'],
            'bank_name' => ['required', 'string','email','max:255'],
            'account_number' => ['required', 'string', 'max:255'],
        ]);
        $affiliate = auth()->user()->affiliate;
        $affiliate->bank_code = $request->bank_code;
        $affiliate->bank_name = $request->bank_name;
        $affiliate->account_number = $request->account_number;
        $affiliate->save();
        return redirect()->route('affiliate.index');
    }

    
    public function overview()
    {
        $orders = auth()->user()->affiliate->orders;
        return view('user.affiliate.overview',compact('orders'));
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }

    
    public function destroy(string $id)
    {
        //
    }
}
