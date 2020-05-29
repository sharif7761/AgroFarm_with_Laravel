<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Cart;
use App\Http\Requests;
use Session;
use Toastr;

class DistributorTransactionController extends Controller
{
    public function show_transactions()
    {
        $all_transaction = DB::table('dtransaction')
                                ->get();
         
                                return view('distributor/transactionreport',compact('all_transaction'));

    }

    public function search_transactions(Request $request)
    {
        $search= $request->search;
        $all_transaction = DB::table('dtransaction')
                                 ->where('TRname','like',$search.'%')
                                ->get();

                               if(count($all_transaction)>0){
                                    Toastr::success('Search result generated', 'Search', ["positionClass" => "toast-top-right"]);
                                    
                                    return view('distributor/transactionreport',compact('all_transaction'));
                                }
                                else{
                                    Toastr::error('No match found', 'Search', ["positionClass" => "toast-top-right"]);
                                    return redirect('/distributor_transactionreport');
                                }
                                
        

    }

    public function add_transactions(Request $request)
    {

        $data=array();
        $data['TRname']=$request->TRname;
        $data['TRType']=$request->TRType;
        $data['Price']=$request->Price;
        $data['Description']=$request->Description;
        $data['Date']=$request->Date;
        

       
        $insert_transaction = DB::table('dtransaction')
                                 ->insert($data);
        $all_transaction = DB::table('dtransaction')
                              ->get();
                               

                               if($insert_transaction){
                                    Toastr::success('transaction Inserted', 'Insert', ["positionClass" => "toast-top-right"]);
                                    return redirect('/distributor_transactionreport');
                                    return view('distributor/transactionreport',compact('all_transaction'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Insert', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
                                
        

    }

    public function update_transactions(Request $request)
    {

        $data=array();
        $dTRid=$request->dTRid;
           $data['TRname']=$request->TRname;
        $data['TRType']=$request->TRType;
        $data['Price']=$request->Price;
        $data['Description']=$request->Description;
        $data['Date']=$request->Date;
        

       

        $update_transaction = DB::table('dtransaction')
                                 ->where('dTRid',$dTRid)
                                 ->update($data);
        $all_transaction = DB::table('dtransaction')
                              ->get();
                               

                               if($update_transaction){
                                    Toastr::success('transaction Updated', 'Update', ["positionClass" => "toast-top-right"]);
                                    return redirect('/distributor_transactionreport');
                                    return view('distributor/transactionreport',compact('all_transaction'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Update', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
                                
        

    }

    public function delete_transactions(Request $request)
    {

        $data=array();
        $dTRid=$request->dTRid;
        $delete_transaction = DB::table('dtransaction')
                                 ->where('dTRid',$dTRid)
                                 ->delete();
        $all_transaction = DB::table('dtransaction')
                              ->get();
                               

                               if($delete_transaction){
                                    Toastr::success('transaction Deleted', 'Delete', ["positionClass" => "toast-top-right"]);
                                    return redirect('/distributor_transactionreport');
                                    return view('distributor/transactionreport',compact('all_transaction'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Delete', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
                                
        

    }

}
