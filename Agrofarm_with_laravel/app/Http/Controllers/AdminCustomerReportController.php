<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\customer;
use Cart;
use App\Http\Requests;
use Session;
use Toastr;

class AdminCustomerReportController extends Controller
{
    public function show_customers()
    {
        $all_customer = DB::table('customer')
                                ->get();
         
                                return view('admin/customerreport',compact('all_customer'));

    }

    public function search_customers(Request $request)
    {
        $search= $request->search;
        $all_customer = DB::table('customer')
                                 ->where('name','like',$search.'%')
                                ->get();

                               if(count($all_customer)>0){
                                    Toastr::success('Search result generated', 'Search', ["positionClass" => "toast-top-right"]);
                                    
                                    return view('admin/customerreport',compact('all_customer'));
                                }
                                else{
                                    Toastr::error('No match found', 'Search', ["positionClass" => "toast-top-right"]);
                                    return redirect('/admin_customerreport');
                                }
                                
        

    }

    

    public function update_customers(Request $request)
    {

        $data=array();
        $Cus_id=$request->Cus_id;
        $data['type']=$request->type;

        $update_customer = DB::table('customer')
                                 ->where('Cus_id',$Cus_id)
                                 ->update($data);
        $all_customer = DB::table('customer')
                              ->get();
                               

                               if($update_customer){
                                    Toastr::info('Customer status updated', 'Status', ["positionClass" => "toast-top-right"]);
                                    return redirect('/admin_customerreport');
                                    return view('admin/customerreport',compact('all_customer'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Status', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
                                
        

    }
}
