<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\User;
use Cart;
use App\Http\Requests;
use Session;
use Validator;


class CustomerRegistrationController extends Controller
{
    public function signup()
    {
        return view('customer_registration');
    }

    public function confirm_signup(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'password'=>'required',
            'email'=>'required|unique:customer|email',
            'address'=>'required',
            'con_password'=>'required',
            
            
        ]);
        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['password']=md5($request->password);
        $data['type']='customer';
        $data['pic']='user22.png';
        
        if($request->password==$request->con_password)
       {
        DB::table('customer')->insert($data);

        $email=$request->email;
        //$password=$request->password;
        $result=DB::table('customer')
                ->where('email',$email)
                
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
               
                    }

                    else
                    {
                            echo " con pass does not match";
                    }    
    }


}
