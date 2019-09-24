<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Teacher;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['admin']);
    }
   public function index(){
       return view('admin.home');
   }

   public function teachers()
   {
       $teachers = Teacher::all();
       return view('admin.teachers', compact('teachers'));
   }

   public function statusTeachers(Request $request)
   {
    $item = Teacher::find($request->id);
    $item->status = ($item->status == 1) ? 0 : 1;
    if($item->update()){

        return response()->json(['status' => 'success', 'successMsg' => 'Successfully Updated Teacher Status!']); die;
    }
    return response()->json(['status' => 'failed', 'errorMsg' => 'Something went wrong. Please try again!']);

    }

    public function statusStudents(Request $request)
   {
    $item = Student::find($request->id);
    $item->status = ($item->status == 1) ? 0 : 1;
    if($item->update()){

        return response()->json(['status' => 'success', 'successMsg' => 'Successfully Updated Student Status!']); die;
    }
    return response()->json(['status' => 'failed', 'errorMsg' => 'Something went wrong. Please try again!']);

    }
    public function students()
   {
       $students = Student::all();
       return view('admin.students', compact('students'));
   }


}
