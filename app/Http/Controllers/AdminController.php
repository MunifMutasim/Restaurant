<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdatePassword;

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

    public function updatepassword(UpdatePassword $request){
        $user = Auth::user();
        $current_password = $request->cur_pwd;
        $new_password = $request->password;
        if(Hash::check($current_password, $user->password)){ //Current pass matches user password
            $request->user()->fill(['password' => Hash::make($new_password)])->save();
            return redirect('admin/settings')->with('update_pwd_success','Password Updated Successfully');
        }
        
        else {
            return redirect('admin/settings')->with('update_pwd_fail',"Current Password is Incorrect");
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/admin')->with('logout_msg', 'Logged out Successfully');
    }
}
