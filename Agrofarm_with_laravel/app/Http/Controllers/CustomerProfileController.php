<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\User;
use Cart;
use App\Http\Requests;
use Session;
use App\Http\Controllers\Redirect;


class CustomerProfileController extends Controller
{
    public function customerProfile(Request $request)
    {
        $Cus_id=$request->session()->get('Cus_id');

        $cus_info=DB::table('customer')
            ->where('Cus_id',$Cus_id)
            ->first();

        return view('customer/customer_profile',compact('cus_info'));    

    }

    public function changePass(Request $request)
    {
        $Cus_id=$request->session()->get('Cus_id');
        $cus_info=DB::table('customer')
            ->where('Cus_id',$Cus_id)
            ->first();

            $old_pass=md5($request->old_pass); 
            $new_pass=$request->new_pass;
            $con_pass=$request->con_pass;

           if($old_pass==$cus_info->password)
           {
                if($new_pass==$con_pass)
                {
                    $data=array();
                    $new_pass=md5($new_pass);
                    $data['password']=$new_pass;
                    DB::table('customer')
                    ->where('Cus_id',$Cus_id)
                    ->update($data);

                    $request->session()->flash('Success_message',' pass changed successfully');
                    $request->session()->flash('Error_message',null);
                    return redirect('/customer_profile'); 

                }
                else
                {
                    $request->session()->flash('Error_message',' Confirm Password doesnot matched !!!');
                    $request->session()->flash('Success_message',NULL); 
                    return redirect('/customer_profile');     
                }
           }
           else
           {
            $request->session()->flash('Error_message',' Old Password does not matched !!!');
            $request->session()->flash('Success_message',NULL);
            return redirect('/customer_profile'); 
           } 

            

    }

    public function editInfo(Request $request)
    {
        $Cus_id=$request->session()->get('Cus_id');
        $cus_info=DB::table('customer')
            ->where('Cus_id',$Cus_id)
            ->first();

            $data=array();            
            $data['Cus_id']=$Cus_id;          
            $data['name']=$request->name;
           $data['email']=$request->email;
           $data['phone']=$request->phone;
           $data['address']=$request->address;

           DB::table('customer')
                    ->where('Cus_id',$Cus_id)
                    ->update($data);
                $request->session()->put('name', $request->name);
                              
                    $request->session()->flash('Success_message',' Profile Info changed successfully');
                    $request->session()->flash('Error_message',null);
        
                    //return Redirect::back()->with('cus_info');
                    return redirect('/customer_profile');    

            
            
                   }
                   public function changePic(Request $request)
                   {
                       $Cus_id=$request->session()->get('Cus_id');
                       $cus_info=DB::table('customer')
                           ->where('Cus_id',$Cus_id)
                           ->first();

                           $image = $request->file('cus_image');
        
            if(($image)){
                $data=array();
                
        $image_name=$image->getClientOriginalName();
         // $ext=strtolower($image->getClientOriginalExtension());
          $image_full_name=$image_name;
          $upload_path='images/';
          $image_url=$upload_path.$image_full_name;
          $success=$image->move($upload_path,$image_full_name);
          $data['pic']=$image_name;

          DB::table('customer')
          ->where('Cus_id',$Cus_id)  
          ->update($data);

          return redirect('/customer_profile');    

       }
                              
            }
}
