<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Cart;
use App\Http\Requests;
use Session;
use Toastr;

class OwnerAppointmentReportController extends Controller
{
   public function show_appointments()
    {
        $all_appointment = DB::table('appointment')
                                ->get();
         
                                return view('owner/appointmentreport',compact('all_appointment'));

    }

    public function search_appointments(Request $request)
    {
        $search= $request->search;
        $all_appointment = DB::table('appointment')
                                 ->where('name','like',$search.'%')
                                ->get();

                               if(count($all_appointment)>0){
                                    Toastr::success('Search result generated', 'Search', ["positionClass" => "toast-top-right"]);
                                    
                                    return view('owner/appointmentreport',compact('all_appointment'));
                                }
                                else{
                                    Toastr::error('No match found', 'Search', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_appointmentreport');
                                }
                                
        

    }

    public function add_appointments(Request $request)
    {

        $data=array();
        $data['name']=$request->name;
        $data['date']=$request->date;
        $data['status']=$request->status;
       
        

       
        $insert_appointment = DB::table('appointment')
                                 ->insert($data);
        $all_appointment = DB::table('appointment')
                              ->get();
                               

                               if($insert_appointment){
                                    Toastr::success('appointment Inserted', 'Insert', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_appointmentreport');
                                    return view('owner/appointmentreport',compact('all_appointment'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Insert', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
                                
        

    }

    public function update_appointments(Request $request)
    {

        $data=array();
        $id=$request->id;
            $data['name']=$request->name;
        $data['date']=$request->date;
        $data['status']=$request->status;
       
        

       

        $update_appointment = DB::table('appointment')
                                 ->where('id',$id)
                                 ->update($data);
        $all_appointment = DB::table('appointment')
                              ->get();
                               

                               if($update_appointment){
                                    Toastr::success('appointment Updated', 'Update', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_appointmentreport');
                                    return view('owner/appointmentreport',compact('all_appointment'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Update', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
                                
        

    }

    public function delete_appointments(Request $request)
    {

        $data=array();
        $id=$request->id;
        $delete_appointment = DB::table('appointment')
                                 ->where('id',$id)
                                 ->delete();
        $all_appointment = DB::table('appointment')
                              ->get();
                               

                               if($delete_appointment){
                                    Toastr::success('appointment Deleted', 'Delete', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_appointmentreport');
                                    return view('owner/appointmentreport',compact('all_appointment'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Delete', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
                                
        

    }
}
