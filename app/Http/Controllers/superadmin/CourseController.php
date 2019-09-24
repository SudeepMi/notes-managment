<?php

namespace App\Http\Controllers\superAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Course\CreateCourse;
use App\Models\Course;

class CourseController extends Controller
{
    //

    protected $courses;

    public function __construct(Course $course)
    {
        $this->courses = $course;
    }
    public function index(){
        $courses = $this->courses::all();
        return view('superadmin.courses', compact('courses'));
    }

    public function create(){
        return view('superadmin.addcourse');
    }

    public function store(CreateCourse $request){
        $this->courses::create($request->all());
        return redirect()->route('cpannel.master.courses');
    }

    public function updateStatus(Request $request){
        $item = $this->courses::find($request->id);
        $item->status = ($item->status == 1) ? 0 : 1;
        if($item->update()){

            return response()->json(['status' => 'success', 'successMsg' => 'Successfully Updated Course Status!']); die;
        }
        return response()->json(['status' => 'failed', 'errorMsg' => 'Something went wrong. Please try again!']);

    }
}
