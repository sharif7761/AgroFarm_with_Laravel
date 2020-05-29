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


class OwnerUserReportController extends Controller
{
     public function show_users()
    {
        $all_user = DB::table('user')
                                ->get();
         
                                return view('owner/userreport',compact('all_user'));

    }

    public function search_users(Request $request)
    {
        $search= $request->search;
        $all_user = DB::table('user')
                                 ->where('Uname','like',$search.'%')
                                ->get();

                               if(count($all_user)>0){
                                    Toastr::success('Search result generated', 'Search', ["positionClass" => "toast-top-right"]);
                                    
                                    return view('owner/userreport',compact('all_user'));
                                }
                                else{
                                    Toastr::error('No match found', 'Search', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_userreport');
                                }
                                
        

    }

    public function add_users(Request $request)
    {

        $data=array();
        $data['Uname']=$request->Uname;
        $data['Phone']=$request->Phone;
        $data['Email']=$request->Email;
        $data['Address']=$request->Address;
 $hashed = Hash       ::make($request->Password, ['rounds' => 12]);
        $data['Password']=$hashed;
        $data['Position']=$request->Position;

        $pic=$request->file('pic');
        $pic_n=hexdec(uniqid());
        $ext=strtolower($pic->getClientOriginalExtension());
        $pic_name=$pic_n.'.'.$ext;
        $upload_path='images/';
        $upload=$pic->move($upload_path,$pic_name);
        $data['pic']=$pic_name;
        

       
        $insert_user = DB::table('user')
                                 ->insert($data);
        $all_user = DB::table('user')
                              ->get();
                               

                               if($insert_user){
                                    Toastr::success('user Inserted', 'Insert', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_userreport');
                                    return view('owner/userreport',compact('all_user'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Insert', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
                                
        

    }

    public function update_users(Request $request)
    {

        $data=array();
        $Uid=$request->Uid;
           $data['Uname']=$request->Uname;
        $data['Phone']=$request->Phone;
        $data['Email']=$request->Email;
        $data['Address']=$request->Address;
        $data['Position']=$request->Position;

        if($request->file('pic')){
            $pic=$request->file('pic');
            $pic_n=hexdec(uniqid());
            $ext=strtolower($pic->getClientOriginalExtension());
            $pic_name=$pic_n.'.'.$ext;
            $upload_path='images/';
            $upload=$pic->move($upload_path,$pic_name);
            $data['pic']=$pic_name;
        }
        

       

        $update_user = DB::table('user')
                                 ->where('Uid',$Uid)
                                 ->update($data);
        $all_user = DB::table('user')
                              ->get();
                               

                               if($update_user){
                                    Toastr::success('user Updated', 'Update', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_userreport');
                                    return view('owner/userreport',compact('all_user'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Update', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
                                
        

    }

    public function delete_users(Request $request) 
    {

        $data=array();
        $Uid=$request->Uid;
        $delete_user = DB::table('user')
                                 ->where('Uid',$Uid)
                                 ->delete();
        $all_user = DB::table('user')
                              ->get();
                               

                               if($delete_user){
                                    Toastr::success('user Deleted', 'Delete', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_userreport');
                                    return view('owner/userreport',compact('all_user'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Delete', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
                                
        

    }
}
