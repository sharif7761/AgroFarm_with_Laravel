<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Cart;
use App\Http\Requests;
use Session;
use Toastr;


class OwnerEmployeeReportController extends Controller
{
     public function show_employees()
    {
        $all_employee = DB::table('employee')
                                ->get();
         
                                return view('owner/employeereport',compact('all_employee'));

    }

    public function search_employees(Request $request)
    {
        $search= $request->search;
        $all_employee = DB::table('employee')
                                 ->where('FullName','like',$search.'%')
                                ->get();

                               if(count($all_employee)>0){
                                    Toastr::success('Search result generated', 'Search', ["positionClass" => "toast-top-right"]);
                                    
                                    return view('owner/employeereport',compact('all_employee'));
                                }
                                else{
                                    Toastr::error('No match found', 'Search', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_employeereport');
                                }
                                
        

    }

    public function add_employees(Request $request)
    {

        $data=array();
        $data['FullName']=$request->FullName;
        $data['Address']=$request->Address;
        $data['Phone']=$request->Phone;
        $data['Position']=$request->Position;
        $data['Salary']=$request->Salary;
        

       
        $insert_employee = DB::table('employee')
                                 ->insert($data);
        $all_employee = DB::table('employee')
                              ->get();
                               

                               if($insert_employee){
                                    Toastr::success('employee Inserted', 'Insert', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_employeereport');
                                    return view('owner/employeereport',compact('all_employee'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Insert', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
                                
        

    }

    public function update_employees(Request $request)
    {


        $data=array();
        $Eid=$request->Eid;
        $data['FullName']=$request->FullName;
        $data['Address']=$request->Address;
        $data['Phone']=$request->Phone;
        $data['Position']=$request->Position;
        $data['Salary']=$request->Salary;
        

       

        $update_employee = DB::table('employee')
                                 ->where('Eid',$Eid)
                                 ->update($data);
        $all_employee = DB::table('employee')
                              ->get();
                               

                               if($update_employee){
                                    Toastr::success('employee Updated', 'Update', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_employeereport');
                                    return view('owner/employeereport',compact('all_employee'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Update', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
                                
        

    }

    public function delete_employees(Request $request)
    {

        $data=array();
        $Eid=$request->Eid;
        $delete_employee = DB::table('employee')
                                 ->where('Eid',$Eid)
                                 ->delete();
        $all_employee = DB::table('employee')
                              ->get();
                               

                               if($delete_employee){
                                    Toastr::success('employee Deleted', 'Delete', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_employeereport');
                                    return view('owner/employeereport',compact('all_employee'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Delete', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
                                
        

    }
}
