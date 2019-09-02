<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('backview/basic_admin/index',compact('user'));
    }

    public function login(Request $request){
        if ($request->isMethod('post')){
            $data = $request->all();

            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'admin' => '1'])){
                //return redirect()->action('AdminController@dashboard');//This thing works fine.
                return redirect('admin/index');
            }

            else {
                // echo "Error";die;
                //return Redirect::back()->withErrors(['msg', 'Invalid Username or Password']);
                return redirect()->back()->with('invalid_login', 'Invalid Username or Password');
                // return redirect()->back();
            }
        }
        
        return view('backview/basic_admin/login');
    } 

    //Ajax er jonno.
    //To check if current password entered by user actually matched with user pass.
    //We need this function for update password functionality.
    public function checkpassword(Request $request){
        $user = Auth::user();
        $current_pass = $request->cur_pwd;

        if(Hash::check($current_pass, $user->password)){
            //echo "true";die;//This works too
            return "true";
        }
        
        else {
            //echo "false";die;//This works too
            return "false";
        }
    }

    public function settings(){
        $user = Auth::user();
        return view('backview/basic_admin/settings',compact('user'));
    }

    public function updatepassword(Request $request){
        $validation = $request->validate([
            'cur_pwd'  => 'required',
            'password' => 'required|confirmed',
        ]);

        if ($validation->fails()){
            return Redirect::to('/admin/settings')->with('message','Failed');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/admin')->with('logout_msg', 'Logged out Successfully');
    }
}
