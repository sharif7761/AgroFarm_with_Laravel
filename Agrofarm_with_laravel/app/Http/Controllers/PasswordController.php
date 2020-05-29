<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Cart;
use App\Http\Requests;
use Session;
use Toastr;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function change_password(Request $request)
    {
        $Uid = session()->get('Uid');
        $user = DB::table('user')
                                ->where('Uid',$Uid)
                                ->get()
                                ->first();
        if(Hash::check($request->old_pass, $user->Password)){
            if($request->new_pass==$request->con_pass){
                $hashed = Hash::make($request->new_pass, ['rounds' => 12]);
                $data=array();
                $data['Password']=$hashed;
                $update_user = DB::table('user')
                                 ->where('Uid',$Uid)
                                 ->update($data);
                Toastr::success('Successfull!!', 'Change Password', ["positionClass" => "toast-top-right"]);
                return Redirect()->back();
            }
            else{
                Toastr::error('Confirm not matched!!', 'Change Password', ["positionClass" => "toast-top-right"]);
                return Redirect()->back();
            }

        }
        else{
            Toastr::error('Wrong password!!', 'Change Password', ["positionClass" => "toast-top-right"]);
            return Redirect()->back();
        }
                                

    }
}
