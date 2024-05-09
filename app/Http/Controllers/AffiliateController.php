<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Country;
use App\Models\Payment;
use App\Models\Setting;
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
        $this->middleware('auth')->except('index');
        // $domain = request()->domain ? request()->domain: request()->root();
        // $affiliate = Affiliate::where('username', $domain)->first();
        // \abort_if(!$affiliate,404);
    }
    
    public function index()
    { 
        return view('webpages.affiliate');
        if(auth()->user()->affiliate && auth()->user()->affiliate->account_number){
            return redirect()->route('affiliate.overview');
        }
        $countries = Country::all();
        return view('user.affiliate.register',compact('countries'));
    }

    
    public function register(Request $request)
    {
        $request->validate([
            'affiliate_name' => ['required', 'string'],
            'affiliate_email' => ['required', 'string','email','max:255'],
            'affiliate_phone' => ['required', 'string', 'max:255'],
            'affiliate_country' => ['required', 'string'],
        ]);
        $percentage = Setting::where('name','affiliate_percentage')->first()->value;
        $affiliate = Affiliate::updateOrCreate(['user_id'=> auth()->id(),'email'=> $request->affiliate_email],
                ['name'=> $request->affiliate_name,
                'phone'=> $request->affiliate_phone,
                'country_id'=> $request->affiliate_country,'percentage'=> $percentage]);
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
        $banks = $this->banks(auth()->user()->affiliate->country->iso);
        return view('user.affiliate.bank_account',compact('banks'));
    }

    public function storeBankAccount(Request $request){
        $request->validate([
            'bank_code' => ['required', 'string'],
            'bank_name' => ['required', 'string'],
            'account_number' => ['required', 'string'],
        ]);
        $affiliate = auth()->user()->affiliate;
        $affiliate->bank_code = $request->bank_code;
        $affiliate->bank_name = $request->bank_name;
        $affiliate->account_number = $request->account_number;
        $affiliate->save();
        return redirect()->route('affiliate.index');
    }
    
    public function dashboard()
    {
        // $payments = auth()->user()->affiliate->payments;
        $payments = Payment::where('affiliate_id',auth()->user()->affiliate_id)->whereHas('settlement')->get();
        $affiliate = auth()->user()->affiliate;
        $currencies = Currency::all();
        return view('user.affiliate.overview',compact('payments','affiliate','currencies'));
    }

    public function coupon(Request $request){

        if($request->action == 'create'){
            $request->validate([
                'percentage' => 'required',
                'minimum' => 'nullable',
                'start_at' => 'nullable',
                'end_at' => 'nullable',
            ]);
            Coupon::create(['affiliate_id'=> auth()->user()->affiliate->id,
            'code'=> strtoupper( substr(uniqid('', true), 6)),'start_at'=> $request->start_at ?? now(),
            'end_at'=> $request->end_at,'minimum'=> $request->minimum ?? 0,'percentage'=> $request->percentage,
            'limit_per_user'=> $request->limit_per_user,'status'=> $request->status]);
        }elseif($request->action == 'delete'){
            Coupon::where('id',$request->coupon_id)->delete();
        }else{
            Coupon::where('id',$request->coupon_id)->update(['status'=> $request->status]);
        }
        return redirect()->back();
    }

}
