<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use View;
use Storage;

class NotesController extends Controller
{
    //
    public function addNotes(){
        $course = Course::all();
        $view = View::make('components.addnotes',
        ['course' => $course]);

        return view('superadmin.notes', compact('view'));
    }
    public function upload( $request){
        dd($request);
    }
    public function StoreNotes(Request $request){

               $course = Course::where('id',$request->course)->first();
        // dd($course);
        $files = $request->file();
        foreach($files['notes'] as $file){
            $ext = $file->clientExtension();
           $data['course_id'] = $request->course;
           $data['class_date'] = $request->class_date;
           $data['file_name'] = $course->name."_".$request->class_date."_".time().".".$ext;
           Note::create($data);
           Storage::disk('public')->putFileAs('notes',$file,$data['file_name']);

        }
        return redirect()->back();
    }
}
