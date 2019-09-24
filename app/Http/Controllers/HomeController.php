<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\RecieveMsgRequest;
use App\Models\ContactDetails;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Course;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::where('status', 1)->limit(6)->get();
        return view('welcome', compact('courses'));
    }

    public function login(){
        return view('login');
    }

    public function admission()
    {
        return view('admission');
    }


    public function contactPage(){
        $contact = ContactDetails::first();
        return view('contact', compact('contact'));
    }

    public function RecieveMsg(Request $request){

        $data = $this->getArray($request);
        $this->withValidate($data, new RecieveMsgRequest());
        if (Contact::create($data)) {
            return response()->json(['status' => 'success', 'successMsg' => 'Successfully Updated Contact Details!']); die;
            }
        return response()->json(['status' => 'failed', 'errorMsg' => 'Something went wrong. Please try again!']);
    }

    public function Coursedetails($slug)
    {
        $course = Course::where('slug', $slug)->first();
       return view('coursedetail',compact('course'));
    }
}
