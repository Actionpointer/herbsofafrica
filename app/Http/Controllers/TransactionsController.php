<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Revenue;
use App\Models\Settlement;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{

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
        abort_if(auth()->user()->role != 'admin',503,'Unauthorized Access');
        //dd($request->all());
        switch($request->action){
            case 'create':
                            $request->validate([
                                'student_name' => 'required',
                                'image' => 'required',
                                'course' => 'required',
                                'year' => 'required',
                                'review' => 'required',
                            ]);
                            Testimonial::create(['student_name' => $request->student_name ,
                            'image' => $request->image,
                            'course_title' => $request->course,
                            'year' => $request->year,
                            'review' => $request->review]);
                            return redirect()->back()->with(['flash_message'=> 'Successfully Created']);
                break;
            case 'update':  
                            Testimonial::where('id',$request->testimonial_id)->update(['student_name' => $request->student_name ,
                            'image' => $request->image,
                            'course_title' => $request->course,
                            'year' => $request->year,
                            'review' => $request->review]);
                            return redirect()->back()->with(['flash_message'=> 'Successfully Updated']);
                break;
            case 'delete':
                            $testimonial = Testimonial::find($request->testimonial_id);
                            $testimonial->delete();
                            return redirect()->back()->with(['flash_message'=> 'Successfully Deleted']);
                break;
    
    

        }
    }
}
