<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index(){
        abort_if(auth()->user()->role != 'admin',503,'Unauthorized Access');
        $testimonials = Testimonial::orderBy('created_at','desc')->paginate(20);
        $courses = Course::all();
        return view('admin.testimonial',compact('testimonials','courses'));
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
