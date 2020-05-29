<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Cart;
use App\Http\Requests;
use Session;
use Toastr;

class DistributorWarehouseController extends Controller
{
     public function show_warehouses()
    {
        $all_warehouse = DB::table('dwarehouse')
                                ->get();
         
                                return view('distributor/warehousereport',compact('all_warehouse'));

    }

    public function search_warehouses(Request $request)
    {
        $search= $request->search;
        $all_warehouse = DB::table('dwarehouse')
                                 ->where('Wname','like',$search.'%')
                                ->get();

                               if(count($all_warehouse)>0){
                                    Toastr::success('Search result generated', 'Search', ["positionClass" => "toast-top-right"]);
                                    
                                    
                                    return view('distributor/warehousereport',compact('all_warehouse'));
                                    
                                }
                                else{
                                    Toastr::error('No match found', 'Search', ["positionClass" => "toast-top-right"]);
                                    return redirect('/distributor_warehousereport');
                                }
                                
        

    }

    public function add_warehouses(Request $request)
    {

        $data=array();
        $data['Wname']=$request->Wname;
        $data['FoodName']=$request->Fname;
        $data['Quantity']=$request->Quantity;

        $insert_warehouse = DB::table('dwarehouse')
                                 ->insert($data);
        $all_warehouse = DB::table('dwarehouse')
                              ->get();
                               

                               if($insert_warehouse){
                                    Toastr::success('Warehouse Inserted', 'Insert', ["positionClass" => "toast-top-right"]);
                                    return redirect('/distributor_warehousereport');
                                    return view('distributor/warehousereport',compact('all_warehouse'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Insert', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
                                
        

    }

    public function update_warehouses(Request $request)
    {
        $dWid=$request->dWid;
        $data=array();
        $data['Wname']=$request->Wname;
        $data['FoodName']=$request->Fname;
        $data['Quantity']=$request->Quantity;

        $update_warehouse = DB::table('dwarehouse')
                                 ->where('dWid',$dWid)
                                 ->update($data);
        $all_warehouse = DB::table('dwarehouse')
                              ->get();
                               

                               if($update_warehouse){
                                    Toastr::success('Warehouse Updated', 'Update', ["positionClass" => "toast-top-right"]);
                                    return redirect('/distributor_warehousereport');
                                    return view('distributor/warehousereport',compact('all_warehouse'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Update', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
                                
        

    }

    public function delete_warehouses(Request $request)
    {

        $data=array();
        $dWid=$request->dWid;
        $delete_warehouse = DB::table('dwarehouse')
                                 ->where('dWid',$dWid)
                                 ->delete();
        $all_warehouse = DB::table('dwarehouse')
                              ->get();
                               

                               if($delete_warehouse){
                                    Toastr::success('Warehouse Deleted', 'Delete', ["positionClass" => "toast-top-right"]);
                                    return redirect('/distributor_warehousereport');
                                    return view('distributor/warehousereport',compact('all_warehouse'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Delete', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
                                
        

    }

}
