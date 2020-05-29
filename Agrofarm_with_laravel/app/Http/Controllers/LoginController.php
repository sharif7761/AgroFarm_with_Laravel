<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Cart;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Hash;
use Toastr; 


class LoginController extends Controller
{
    
    public function login(Request $request)
    {
        $email=$request->email;
        $password=$request->password;
        $password1=md5($request->password);
        $result=DB::table('customer')
                ->where('email',$email)
                ->where('password',$password1)
                ->first();
               // echo "<pre>";
               // print_r($result);
                //exit();

                if($result)
                {       
                       $request->session()->put('name', $result->name);
                       $request->session()->put('Cus_id', $result->Cus_id);
                       $request->session()->put('type', $result->type);

                 
                       return redirect('/customer_home');
                }
                else
                {
                    
                    $result=DB::table('user') 
                ->where('Email',$email)
                ->first();
               // echo "<pre>";
               // print_r($result);
                //exit();

                if($result)
                {     
                    if (Hash::check($password, $result->Password)){

                        $request->session()->put('Uname', $result->Uname);
                        $request->session()->put('Uid', $result->Uid); 
                        $request->session()->put('Position', $result->Position);

                 
                        if($result->Position=='Owner')
                        {
                            return redirect('/owner_home');
                        }
                        if($result->Position=='Manager')
                        {
                            return redirect('/admin_home');
                        }
                        if($result->Position=='Sales Distributor')
                        {
                            return redirect('/distributor_home');
                        }
                    }
                    else{
                        Toastr::error('Wrong password!!', 'Login', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                    }
                        
                }
                else
                {
                    
                    Toastr::error('Wrong credentials!!', 'Login', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                }

                }

    }
}