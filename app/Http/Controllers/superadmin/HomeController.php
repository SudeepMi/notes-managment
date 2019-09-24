<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Create\AdminRequest;
use App\Models\Admin;
use App\Models\ContactDetails;
use Yoeunes\Toastr\Facades\Toastr;
use Hash;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['master']);
    }
   public function index(){
       return view('superadmin.home');
   }
   public function admins(){
       $admins = Admin::all();
       return view('superadmin.admins',compact('admins'));
   }

   public function addAdmins(){
    return view('superadmin.add_admins');
   }
   public function storeAdmins(AdminRequest $request){
       $bag['name'] = $request->name;
       $bag['email'] = $request->email;
       $bag['phone'] = $request->phone;
       $bag['password'] = Hash::make($request->password);

       if(Admin::create($bag)){
       return redirect()->route('cpannel.master.admins');
       }
   }

   public function statusAdmins(Request $request)
   {
    $item = Admin::find($request->id);
    $item->status = ($item->status == 1) ? 0 : 1;
    if($item->update()){

        return response()->json(['status' => 'success', 'successMsg' => 'Successfully Updated Admin Status!']); die;
    }
    return response()->json(['status' => 'failed', 'errorMsg' => 'Something went wrong. Please try again!']);

    }

    public function updateAdmins(Request $request)
    {
        $data = $this->getArray($request);
        $model = Admin::find($data['id']);
        $model->name = $data['name'];
        $model->email = $data['email'];
        $model->phone = $data['phone'];
        if ($model->update()) {
            return response()->json(['status' => 'success', 'successMsg' => 'Successfully Updated Admin Details!']); die;
        }
        return response()->json(['status' => 'failed', 'errorMsg' => 'Something went wrong. Please try again!']);

    }

    public function COntactDetails(){
        $details = ContactDetails::first();
        return view('superadmin.contact_details',compact('details'));
    }

    public function UpdateContactDetails(Request $request)
    {
        $data = $this->getArray($request);
        $model = ContactDetails::find($data['id']);
        $model->name = $data['name'];
        $model->email = $data['email'];
        $model->phone = $data['phone'];
        $model->address = $data['address'];
        if ($model->update()) {
            return response()->json(['status' => 'success', 'successMsg' => 'Successfully Updated Contact Details!']); die;
        }
        return response()->json(['status' => 'failed', 'errorMsg' => 'Something went wrong. Please try again!']);
    }


}
