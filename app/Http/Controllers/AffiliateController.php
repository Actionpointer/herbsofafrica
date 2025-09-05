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
use Illuminate\Validation\Rule;
use App\Http\Traits\StripeTrait;
use App\Http\Traits\PaystackTrait;

class AffiliateController extends Controller
{
    use StripeTrait,PaystackTrait;

    public function __construct(){
        $this->middleware('auth')->except('index');
    }
    
    public function index(){ 
        return view('webpages.affiliate');
    }

    public function signup(){
        if(auth()->user()->affiliate && auth()->user()->affiliate->account_number){
            return redirect()->route('affiliate.overview');
        }
        $countries = Country::all();
        return view('user.affiliate.register',compact('countries'));
    }

    
    public function register(Request $request)
    {
        $request->validate([
            'affiliate_name' => ['required', 'string',Rule::notIn(['host','mail','www','ftp','localhost','webmail','admin','_dmarc','dmarc','autodiscover','site','autoconfig','202404._domainkey']),],
            'affiliate_email' => ['required', 'string','email','max:255'],
            'affiliate_phone' => ['required', 'string', 'max:255'],
            'affiliate_country' => ['required', 'string'],
        ]);
        $percentage = Setting::where('name','affiliate_percentage')->first()->value;
        $affiliate = Affiliate::updateOrCreate(['user_id'=> auth()->id(),'email'=> $request->affiliate_email],
                ['name'=> $request->affiliate_name,
                'phone'=> $request->affiliate_phone,
                'country_id'=> $request->affiliate_country,'percentage'=> $percentage]);
        return redirect()->route('affiliate.overview');
        
    }

    public function update(Request $request)
    { 
        $request->validate([
            'affiliate_name' => ['required', 'string'],
            'affiliate_email' => ['required', 'string','email','max:255'],
            'affiliate_phone' => ['required', 'string', 'max:255'],
        ]);
        Affiliate::updateOrCreate(['user_id'=> auth()->id()],
                ['name'=> $request->affiliate_name,'email'=> $request->affiliate_email,
                'phone'=> $request->affiliate_phone]);
        return redirect()->route('affiliate.overview');
    }

    public function stripeOnboarding(){
        if(!$account_number = auth()->user()->affiliate->account_number){
            $account_number = $this->connectStripe(auth()->user()->affiliate);
        }
        $link = $this->accountLink($account_number);
        if(!$link){
            return "error message";
        }else return redirect()->to($link); 

    }

    public function stripePostBoarding(){
        $affiliate = auth()->user()->affiliate;
        $affiliate->account_status = true;
        $affiliate->save();
        return redirect()->route('affiliate.overview');
    }

    public function bankAccountLink(){
        $banks = $this->getBanksByPaystack();
        return view('user.affiliate.bank_account',compact('banks'));
    }

    public function storeBankAccount(Request $request){
        $request->validate([
            'bank_code' => ['required', 'string'],
            'bank_name' => ['required', 'string'],
            'account_number' => ['required', 'string'],
        ]);
        
        $result = $this->createRecipient($request->bank_code,$request->account_number);
        if(!$result){
            return redirect()->back()->with(['result'=> '0','message'=> 'Bank details could not be saved']);
        }else{
            $affiliate = auth()->user()->affiliate;
            $affiliate->account_number = $result;
            $affiliate->account_status = true;
            $affiliate->save();
        }
        return redirect()->route('affiliate.overview');
    }
    
    public function dashboard()
    {
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
            'code'=> strtoupper( substr(uniqid(), -6)),'start_at'=> $request->start_at ?? now(),
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
