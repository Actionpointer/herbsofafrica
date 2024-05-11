<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Revenue;
use App\Models\Settlement;
use Illuminate\Http\Request;
use App\Http\Traits\PayoutTrait;

class TransactionsController extends Controller
{
    use PayoutTrait;

    public function payments(){
        $payments = Payment::orderBy('created_at','desc')->get();
        return view('admin.transactions.payments',compact('payments'));
    }

    public function settlements(){
        $settlements = Settlement::orderBy('created_at','desc')->get();
        return view('admin.transactions.settlements',compact('settlements'));
    }

    public function revenues(){
        $revenues = Revenue::orderBy('created_at','desc')->get();
        return view('admin.transactions.revenues',compact('revenues'));
    }


    public function manage(Request $request){
        
        Settlement::where('id',$request->settlement_id)->update(['status'=> $request->status]);
        return redirect()->back();
    }

    public function pay(Request $request){
        $settlement = Settlement::find($request->settlement_id);
        if($settlement->status == 'failed')
            $this->retrySettlement($settlement);
        else 
            $this->initializeSettlement($settlement);
        return redirect()->back();
    }
}
