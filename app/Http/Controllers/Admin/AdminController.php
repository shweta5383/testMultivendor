<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash, Response, Validator, Session;
use App\Models\Admin;
use Image;

class AdminController extends Controller
{
    public function __construct()
    {
        //$this->middleware('admin');
    }

    public function dashboard(){
       // \Session::put('page', 'dashboard');
        return view('admin/dashboard');
    }

    public function settings(){
        return view('admin/admin_settings');
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $validated = $request->validate([
                //'admin_email' => 'required|unique:admins,email|max:255',
                'admin_email' => 'required|email|max:255',
                'admin_password' => 'required',
            ]);        
            if(\Auth::guard('admin')->attempt(['email'=>$data['admin_email'],'password'=>$data['admin_password']])){
                return redirect()->route('admin-dashboard');
            }else{
                // \session::flash('msg', 'User and Password is incorrect');
                // return redirect()->back();
                return redirect()->back()->with('msg', 'Email and Password is incorrect');
            }
        }
        return view('admin/admin_login');
    }

    public function logout(){
        \Auth::guard('admin')->logout();
        return redirect()->route('admin-login');
    }

    public function checkPassword(Request $request){
       // $password = Auth::guard()->User()->password;
        //if(Hash::check($request->current_password,  \Auth::guard('admin')->User()->password)){
        if(password_verify($request->current_password,  \Auth::guard('admin')->User()->password)){
            $arr = array('msg'=>'Current password is correct', 'status' => true);
        }else{
            $arr = array('msg'=>'Current password is incorrect', 'status' => false);
        }
        return Response()->json($arr);
    }

    public function updatePassword(Request $request){
        //\Session::put('page', 'update-password');
        //echo $request->get('new_password'); die();
        $data = $request->all();
        $validateData = $request->validate([
            'new_password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:6'
        ]);

        Admin::where('id', Auth::guard('admin')->User()->id)->update(['password'=>bcrypt($data['new_password'])]);

        if($validateData){
            \Session::flash('success','New Password has been updated successfully');
            return redirect()->back();
        }
    }

    public function updateAdminDetails(Request $request){
        //\Session::put('page', 'update-admin-details');
        if($request->isMethod('post')){
            $data = $request->all();
            $validateData = $request->validate([
                'admin_name' => 'required',
                'admin_mobile' => 'required|numeric'
            ]); 

            if($request->hasFile('admin_image')){
                $image_temp = $request->file('admin_image');
                if($image_temp->isValid()){
                    $extension = $image_temp->getClientOriginalExtension();
                    $imageName = rand(111,9999)."_".Auth::guard('admin')->User()->id.".".$extension;
                    $image_path = storage_path()."/app/public/admin_image/".$imageName;
                    Image::make($image_temp)->resize(300,300)->save($image_path);
                }
            }elseif(!empty($request->get('current_admin_image'))){
                $imageName = $request->get('current_admin_image');
            }else{
                $imageName = '';
            }
            
            $admin = Admin::where('email', Auth::guard('admin')->User()->email)->update(['name' => $data['admin_name'], 'mobile' => $data['admin_mobile'], 'image' => $imageName]);

            if($validateData){
                \Session::flash('success', 'Admin details updated successfully');
                return redirect()->back();    
            }
        }
        return view('admin/update_admin_details');
    }
}
