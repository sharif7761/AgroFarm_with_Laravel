<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Cart;
use App\Http\Requests;
use Session;
use Toastr;

class OwnerReportController extends Controller
{
    //food report=======================

    public function show_foods()
    {
        $all_food = DB::table('food')
                                ->get();
         
                                return view('owner/foodreport',compact('all_food'));

    }

    public function search_foods(Request $request)
    {
        $search= $request->search;
        $all_food = DB::table('food')
                                 ->where('Fname','like',$search.'%')
                                ->get();

                               if(count($all_food)>0){
                                    Toastr::success('Search result generated', 'Search', ["positionClass" => "toast-top-right"]);
                                    
                                    
                                    return view('owner/foodreport',compact('all_food'));
                                    
                                }
                                else{
                                    Toastr::error('No match found', 'Search', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_foodreport');
                                }
                                
        

    }

    public function add_foods(Request $request)
    {

        $data=array();
        $data['Fname']=$request->fname;
        $data['Quantity']=$request->Quantity;
        $data['Type']=$request->Type;
        $data['PRate']=$request->pRate;
        $data['SRate']=$request->sRate;
        $data['Description']=$request->description;

        $Fimage=$request->file('Fimage');
        $Fimage_n=hexdec(uniqid());
        $ext=strtolower($Fimage->getClientOriginalExtension());
        $Fimage_name=$Fimage_n.'.'.$ext;
        $upload_path='images/';
        $upload=$Fimage->move($upload_path,$Fimage_name);
        $data['Fimage']=$Fimage_name;

        $Fimage1=$request->file('Fimage1');
        $Fimage1_n=hexdec(uniqid());
        $ext=strtolower($Fimage1->getClientOriginalExtension());
        $Fimage1_name=$Fimage1_n.'.'.$ext;
        $upload_path='images/';
        $upload=$Fimage1->move($upload_path,$Fimage1_name);
        $data['Fimage1']=$Fimage1_name;

        $Fimage2=$request->file('Fimage2');
        $Fimage2_n=hexdec(uniqid());
        $ext=strtolower($Fimage2->getClientOriginalExtension());
        $Fimage2_name=$Fimage2_n.'.'.$ext;
        $upload_path='images/';
        $upload=$Fimage2->move($upload_path,$Fimage2_name);
        $data['Fimage2']=$Fimage2_name;

        $insert_food = DB::table('food')
                                 ->insert($data);
        $all_food = DB::table('food')
                              ->get();
                               

                               if($insert_food){
                                    $data1=array();
                                    $data1['TRname']=$request->fname." Production";
                                    $data1['TRType']="debit";
                                    $data1['Price']=$request->Quantity*$request->pRate;
                                    $data1['Description']="Production Expense";
                                    $data1['Date']=date('Y-m-d');
                                    $insert_transaction = DB::table('transaction')
                                                         ->insert($data1);
                                    
                                    $data2=array();
                                    $data2['Quantity']=$request->Quantity;
                                                 
                                    $update_warehouse = DB::table('warehouse')
                                                            ->where('FoodName',$request->fname)
                                                            ->update($data2);                   

                                    Toastr::success('Food Inserted', 'Insert', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_foodreport');
                                    return view('owner/foodreport',compact('all_food'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Insert', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
                                
        

    }

    public function update_foods(Request $request)
    {

        $data=array();
        $Fid=$request->Fid;
        $data['Fname']=$request->fname;
        $q= DB::table('food')
                        ->where('Fid',$Fid)
                        ->first();
                        
        if($request->Quantity){
            if(($q->Quantity+$request->Quantity)>=0){
                $data['Quantity']=$q->Quantity+$request->Quantity;
            }
            else{
                Toastr::error('Not available!!', 'Quantity', ["positionClass" => "toast-top-right"]);
                                        return Redirect()->back();
            }
        }
        $data['Type']=$request->Type;
        $data['PRate']=$request->pRate;
        $data['SRate']=$request->sRate;
        $data['Description']=$request->description;

        if($request->file('Fimage')){
            $Fimage=$request->file('Fimage');
            $Fimage_n=hexdec(uniqid());
            $ext=strtolower($Fimage->getClientOriginalExtension());
            $Fimage_name=$Fimage_n.'.'.$ext;
            $upload_path='images/';
            $upload=$Fimage->move($upload_path,$Fimage_name);
            $data['Fimage']=$Fimage_name;
        }

        if($request->file('Fimage1')){
            $Fimage1=$request->file('Fimage1');
            $Fimage1_n=hexdec(uniqid());
            $ext=strtolower($Fimage1->getClientOriginalExtension());
            $Fimage1_name=$Fimage1_n.'.'.$ext;
            $upload_path='images/';
            $upload=$Fimage1->move($upload_path,$Fimage1_name);
            $data['Fimage1']=$Fimage1_name;
        }

        if($request->file('Fimage2')){
            $Fimage2=$request->file('Fimage2');
            $Fimage2_n=hexdec(uniqid());
            $ext=strtolower($Fimage2->getClientOriginalExtension());
            $Fimage2_name=$Fimage2_n.'.'.$ext;
            $upload_path='images/';
            $upload=$Fimage2->move($upload_path,$Fimage2_name);
            $data['Fimage2']=$Fimage2_name;
        }

        $update_food = DB::table('food')
                                 ->where('Fid',$Fid)
                                 ->update($data);
        $all_food = DB::table('food')
                              ->get();
                               

                               if($update_food){
                                    $data1=array();
                                    $data1['TRname']=$request->fname." Adjusting";
                                    $data1['TRType']="debit";
                                    $data1['Price']=$request->Quantity*$request->pRate;
                                    $data1['Description']="Adjusting Production Expense";
                                    $data1['Date']=date('Y-m-d');
                                    $insert_transaction = DB::table('transaction')
                                                            ->insert($data1);
                                    
                                    $data2=array();
                                    $data2['Quantity']=$q->Quantity+$request->Quantity;
                                                 
                                    $update_warehouse = DB::table('warehouse')
                                                            ->where('FoodName',$request->fname)
                                                            ->update($data2);
                                    Toastr::success('Food Updated', 'Update', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_foodreport');
                                    return view('owner/foodreport',compact('all_food'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Update', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
                                
        

    }

    public function delete_foods(Request $request)
    {

        $data=array();
        $Fid=$request->Fid;
        $delete_food = DB::table('food')
                                 ->where('Fid',$Fid)
                                 ->delete();
        $all_food = DB::table('food')
                              ->get();
                               

                               if($delete_food){
                                    Toastr::success('Food Deleted', 'Delete', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_foodreport');
                                    return view('owner/foodreport',compact('all_food'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Delete', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
                                
        

    }

    //seed report=======================

    public function show_seeds()
    {
        $all_seed = DB::table('seed')
                                ->get();
         
                                return view('owner/seedreport',compact('all_seed'));

    }

    public function search_seeds(Request $request)
    {
        $search= $request->search;
        $all_seed = DB::table('seed')
                                 ->where('Sname','like',$search.'%')
                                ->get();

                               if(count($all_seed)>0){
                                    Toastr::success('Search result generated', 'Search', ["positionClass" => "toast-top-right"]);
                                    
                                    
                                    return view('owner/seedreport',compact('all_seed'));
                                    
                                }
                                else{
                                    Toastr::error('No match found', 'Search', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_seedreport');
                                }
                                
        

    }

    public function add_seeds(Request $request)
    {

        $data=array();
        $data['Sname']=$request->sname;
        $data['Type']=$request->Type;
        $data['Rate']=$request->Rate;
        $data['Quantity']=$request->Quantity;

        $insert_seed = DB::table('seed')
                                 ->insert($data);
        $all_seed = DB::table('seed')
                              ->get();
                               

                               if($insert_seed){
                                    Toastr::success('Seed Inserted', 'Insert', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_seedreport');
                                    return view('owner/seedreport',compact('all_seed'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Insert', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
                                
        

    }

    public function update_seeds(Request $request)
    {
        $Sid=$request->Sid;
        $data=array();
        $data['Sname']=$request->sname;
        $data['Type']=$request->Type;
        $data['Rate']=$request->Rate;
        $data['Quantity']=$request->Quantity;

        $update_seed = DB::table('seed')
                                 ->where('Sid',$Sid)
                                 ->update($data);
        $all_seed = DB::table('seed')
                              ->get();
                               

                              if($insert_seed){
                                $data1=array();
                                $data1['TRname']=$request->sname." Expense";
                                $data1['TRType']="debit";
                                $data1['Price']=$request->Quantity*$request->Rate;
                                $data1['Description']="Seed Expense";
                                $data1['Date']=date('Y-m-d');
                                $insert_transaction = DB::table('transaction')
                                                     ->insert($data1);
                                Toastr::success('Seed Inserted', 'Insert', ["positionClass" => "toast-top-right"]);
                                return redirect('/owner_seedreport');
                                return view('owner/seedreport',compact('all_seed'));
                            }
                            else{
                                Toastr::error('Error!!', 'Insert', ["positionClass" => "toast-top-right"]);
                                return Redirect()->back();
                            }
                                
        

    }

    public function delete_seeds(Request $request)
    {

        $data=array();
        $Sid=$request->Sid;
        $delete_seed = DB::table('seed')
                                 ->where('Sid',$Sid)
                                 ->delete();
        $all_seed = DB::table('seed')
                              ->get();
                               

                               if($delete_seed){
                                    Toastr::success('Seed Deleted', 'Delete', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_seedreport');
                                    return view('owner/seedreport',compact('all_seed'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Delete', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
                                
        

    }

    //pesticide report=======================

    public function show_pesticides()
    {
        $all_pesticide = DB::table('pesticide')
                                ->get();
         
                                return view('owner/pesticidereport',compact('all_pesticide'));

    }

    public function search_pesticides(Request $request)
    {
        $search= $request->search;
        $all_pesticide = DB::table('pesticide')
                                 ->where('Pname','like',$search.'%')
                                ->get();

                               if(count($all_pesticide)>0){
                                    Toastr::success('Search result generated', 'Search', ["positionClass" => "toast-top-right"]);
                                    
                                    
                                    return view('owner/pesticidereport',compact('all_pesticide'));
                                    
                                }
                                else{
                                    Toastr::error('No match found', 'Search', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_pesticidereport');
                                }
                                
        

    }

    public function add_pesticides(Request $request)
    {

        $data=array();
        $data['Pname']=$request->pname;
        $data['Ptype']=$request->Type;
        $data['Rate']=$request->Rate;
        $data['Quantity']=$request->Quantity;

        $insert_pesticide = DB::table('pesticide')
                                 ->insert($data);
        $all_pesticide = DB::table('pesticide')
                              ->get();
                               

                              if($insert_pesticide){
                                $data1=array();
                                $data1['TRname']=$request->pname." Expense";
                                $data1['TRType']="debit";
                                $data1['Price']=$request->Quantity*$request->Rate;
                                $data1['Description']="Pesticide Expense";
                                $data1['Date']=date('Y-m-d');
                                $insert_transaction = DB::table('transaction')
                                                     ->insert($data1);
                                Toastr::success('Pesticide Inserted', 'Insert', ["positionClass" => "toast-top-right"]);
                                return redirect('/owner_pesticidereport');
                                return view('owner/pesticidereport',compact('all_pesticide'));
                            }
                            else{
                                Toastr::error('Error!!', 'Insert', ["positionClass" => "toast-top-right"]);
                                return Redirect()->back();
                            }
                                
        

    }

    public function update_pesticides(Request $request)
    {
        $Pid=$request->Pid;
        $data=array();
        $data['Pname']=$request->pname;
        $data['Ptype']=$request->Type;
        $data['Rate']=$request->Rate;
        $data['Quantity']=$request->Quantity;

        $update_pesticide = DB::table('pesticide')
                                 ->where('Pid',$Pid)
                                 ->update($data);
        $all_pesticide = DB::table('pesticide')
                              ->get();
                               

                               if($update_pesticide){
                                    Toastr::success('Pesticide Updated', 'Update', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_pesticidereport');
                                    return view('owner/pesticidereport',compact('all_pesticide'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Update', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
                                
        

    }

    public function delete_pesticides(Request $request)
    {

        $data=array();
        $Pid=$request->Pid;
        $delete_pesticide = DB::table('pesticide')
                                 ->where('Pid',$Pid)
                                 ->delete();
        $all_pesticide = DB::table('pesticide')
                              ->get();
                               

                               if($delete_pesticide){
                                    Toastr::success('Pesticide Deleted', 'Delete', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_pesticidereport');
                                    return view('owner/pesticidereport',compact('all_pesticide'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Delete', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
                                
        

    }

    //fertilizer report=======================

    public function show_fertilizers()
    {
        $all_fertilizer = DB::table('fertilizer')
                                ->get();
         
                                return view('owner/fertilizerreport',compact('all_fertilizer'));

    }

    public function search_fertilizers(Request $request)
    {
        $search= $request->search;
        $all_fertilizer = DB::table('fertilizer')
                                 ->where('FrName','like',$search.'%')
                                ->get();

                               if(count($all_fertilizer)>0){
                                    Toastr::success('Search result generated', 'Search', ["positionClass" => "toast-top-right"]);
                                    
                                    
                                    return view('owner/fertilizerreport',compact('all_fertilizer'));
                                    
                                }
                                else{
                                    Toastr::error('No match found', 'Search', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_fertilizerreport');
                                }
                                
        

    }

    public function add_fertilizers(Request $request)
    {

        $data=array();
        $data['FrName']=$request->Frname;
        $data['Rate']=$request->Rate;
        $data['Quantity']=$request->Quantity;

        $insert_fertilizer = DB::table('fertilizer')
                                 ->insert($data);
        $all_fertilizer = DB::table('fertilizer')
                              ->get();
                               

                              if($insert_fertilizer){
                                $data1=array();
                                $data1['TRname']=$request->Frname." Expense";
                                $data1['TRType']="debit";
                                $data1['Price']=$request->Quantity*$request->Rate;
                                $data1['Description']="Fertilizer Expense";
                                $data1['Date']=date('Y-m-d');
                                $insert_transaction = DB::table('transaction')
                                                     ->insert($data1);
                                Toastr::success('Fertilizer Inserted', 'Insert', ["positionClass" => "toast-top-right"]);
                                return redirect('/owner_fertilizerreport');
                                return view('owner/fertilizerreport',compact('all_fertilizer'));
                            }
                            else{
                                Toastr::error('Error!!', 'Insert', ["positionClass" => "toast-top-right"]);
                                return Redirect()->back();
                            }
                                
        

    }

    public function update_fertilizers(Request $request)
    {
        $Frid=$request->Frid;
        $data=array();
        $data['FrName']=$request->Frname;
        $data['Rate']=$request->Rate;
        $data['Quantity']=$request->Quantity;

        $update_fertilizer = DB::table('fertilizer')
                                 ->where('Frid',$Frid)
                                 ->update($data);
        $all_fertilizer = DB::table('fertilizer')
                              ->get();
                               

                               if($update_fertilizer){
                                    Toastr::success('Fertilizer Updated', 'Update', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_fertilizerreport');
                                    return view('owner/fertilizerreport',compact('all_fertilizer'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Update', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
                                
        

    }

    public function delete_fertilizers(Request $request)
    {

        $data=array();
        $Frid=$request->Frid;
        $delete_fertilizer = DB::table('fertilizer')
                                 ->where('Frid',$Frid)
                                 ->delete();
        $all_fertilizer = DB::table('fertilizer')
                              ->get();
                               

                               if($delete_fertilizer){
                                    Toastr::success('Fertilizer Deleted', 'Delete', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_fertilizerreport');
                                    return view('owner/fertilizerreport',compact('all_fertilizer'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Delete', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
                                
        

    }

    //warehouse report=======================

    public function show_warehouses()
    {
        $all_warehouse = DB::table('warehouse')
                                ->get();
         
                                return view('owner/warehousereport',compact('all_warehouse'));

    }

    public function search_warehouses(Request $request)
    {
        $search= $request->search;
        $all_warehouse = DB::table('warehouse')
                                 ->where('Wname','like',$search.'%')
                                ->get();

                               if(count($all_warehouse)>0){
                                    Toastr::success('Search result generated', 'Search', ["positionClass" => "toast-top-right"]);
                                    
                                    
                                    return view('owner/warehousereport',compact('all_warehouse'));
                                    
                                }
                                else{
                                    Toastr::error('No match found', 'Search', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_warehousereport');
                                }
                                
        

    }

    public function add_warehouses(Request $request)
    {

        $data=array();
        $data['Wname']=$request->Wname;
        $data['FoodName']=$request->Fname;
        $data['Quantity']=$request->Quantity;

        $insert_warehouse = DB::table('warehouse')
                                 ->insert($data);
        $all_warehouse = DB::table('warehouse')
                              ->get();
                               

                               if($insert_warehouse){
                                    Toastr::success('Warehouse Inserted', 'Insert', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_warehousereport');
                                    return view('owner/warehousereport',compact('all_warehouse'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Insert', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
                                
        

    }

    public function update_warehouses(Request $request)
    {
        $Wid=$request->Wid;
        $data=array();
        $data['Wname']=$request->Wname;
        $data['FoodName']=$request->Fname;
        $data['Quantity']=$request->Quantity;

        $update_warehouse = DB::table('warehouse')
                                 ->where('Wid',$Wid)
                                 ->update($data);
        $all_warehouse = DB::table('warehouse')
                              ->get();
                               

                               if($update_warehouse){
                                    Toastr::success('Warehouse Updated', 'Update', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_warehousereport');
                                    return view('owner/warehousereport',compact('all_warehouse'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Update', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
                                
        

    }

    public function delete_warehouses(Request $request)
    {

        $data=array();
        $Wid=$request->Wid;
        $delete_warehouse = DB::table('warehouse')
                                 ->where('Wid',$Wid)
                                 ->delete();
        $all_warehouse = DB::table('warehouse')
                              ->get();
                               

                               if($delete_warehouse){
                                    Toastr::success('Warehouse Deleted', 'Delete', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_warehousereport');
                                    return view('owner/warehousereport',compact('all_warehouse'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Delete', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
                                
        

    }

    //treatment report=======================

    public function show_treatments()
    {
        $all_treatment = DB::table('treatment')
                                ->get();
         
                                return view('owner/treatmentreport',compact('all_treatment'));

    }

    public function search_treatments(Request $request)
    {
        $search= $request->search;
        $all_treatment = DB::table('treatment')
                                 ->where('Symptom','like',$search.'%')
                                ->get();

                               if(count($all_treatment)>0){
                                    Toastr::success('Search result generated', 'Search', ["positionClass" => "toast-top-right"]);
                                    
                                    
                                    return view('owner/treatmentreport',compact('all_treatment'));
                                    
                                }
                                else{
                                    Toastr::error('No match found', 'Search', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_treatmentreport');
                                }
                                
        

    }

    public function add_treatments(Request $request)
    {

        $data=array();
        $data['Tname']=$request->Tname;
        $data['Symptom']=$request->Symptom;
        $data['Pname']=$request->Pname;
        $data['Frname']=$request->Frname;

        $insert_treatment = DB::table('treatment')
                                 ->insert($data);
        $all_treatment = DB::table('treatment')
                              ->get();
                               

                               if($insert_treatment){
                                    Toastr::success('Treatment Inserted', 'Insert', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_treatmentreport');
                                    return view('owner/treatmentreport',compact('all_treatment'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Insert', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
                                
        

    }

    public function update_treatments(Request $request)
    {
        $Tid=$request->Tid;
        $data=array();
        $data['Tname']=$request->Tname;
        $data['Symptom']=$request->Symptom;
        $data['Pname']=$request->Pname;
        $data['Frname']=$request->Frname;

        $update_treatment = DB::table('treatment')
                                 ->where('Tid',$Tid)
                                 ->update($data);
        $all_treatment = DB::table('treatment')
                              ->get();
                               

                               if($update_treatment){
                                    Toastr::success('Treatment Updated', 'Update', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_treatmentreport');
                                    return view('owner/treatmentreport',compact('all_treatment'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Update', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
                                
        

    }

    public function delete_treatments(Request $request)
    {

        $data=array();
        $Tid=$request->Tid;
        $delete_treatment = DB::table('treatment')
                                 ->where('Tid',$Tid)
                                 ->delete();
        $all_treatment = DB::table('treatment')
                              ->get();
                               

                               if($delete_treatment){
                                    Toastr::success('Treatment Deleted', 'Delete', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_treatmentreport');
                                    return view('owner/treatmentreport',compact('all_treatment'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Delete', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
                                
        

    }

    //order report=======================

    public function show_orders()
    {
        $all_order = DB::table('orders')
                                ->orderBy('Status', 'desc')
                                ->get();
         
                                return view('owner/orderreport',compact('all_order'));

    }

    public function search_orders(Request $request)
    {
        $search= $request->search;
        $all_order = DB::table('orders')
                                 ->where('Fname','like',$search.'%')
                                 ->orderBy('Status', 'desc')
                                 ->get();

                               if(count($all_order)>0){
                                    Toastr::success('Search result generated', 'Search', ["positionClass" => "toast-top-right"]);
                                    
                                    
                                    return view('owner/orderreport',compact('all_order'));
                                    
                                }
                                else{
                                    Toastr::error('No match found', 'Search', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_orderreport');
                                }
                                
        

    }


    public function update_orders(Request $request)
    {
        $Order_id=$request->Order_id;
        $data=array();
        $data['Cus_id']=$request->Cus_id;
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['Fid']=$request->Fid;
        $data['Fname']=$request->Fname;
        $data['Quantity']=$request->Quantity;
        $data['Total_price']=$request->Total_price;
        $data['Status']=$request->Status;
        $q= DB::table('food')
                        ->where('Fid',$request->Fid)
                        ->first();
        if($q->Quantity>=$request->Quantity){
            $q1=$q->Quantity-$request->Quantity;
            $update_order = DB::table('orders')
                                 ->where('Order_id',$Order_id)
                                 ->update($data);
        $all_order = DB::table('orders')
                              ->orderBy('Status', 'desc')
                              ->get();
                               

                               if($update_order){
                                    $data1=array();
                                    $data1['TRname']=$request->Fname." Sold";
                                    $data1['TRType']="credit";
                                    $data1['Price']=$request->Total_price;
                                    $data1['Description']="Order approved";
                                    $data1['Date']=date('Y-m-d');
                                    $insert_transaction = DB::table('transaction')
                                                         ->insert($data1);
                                    $data2=array();
                                    $data2['Quantity']=$q1;
                                    $update_food = DB::table('food')
                                                     ->where('Fid',$request->Fid)
                                                     ->update($data2);
                                    $data3=array();
                                    $data3['Quantity']=$q1;             
                                    $update_warehouse = DB::table('warehouse')
                                                            ->where('FoodName',$request->Fname)
                                                            ->update($data3);
                                    Toastr::success('Order Approved', 'Approve', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_orderreport');
                                    return view('owner/orderreport',compact('all_order'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Approve', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
        }
        else{
            Toastr::error('Quantity not available!!', 'Quantity', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
        }


    }

    public function delete_orders(Request $request)
    {

        $data=array();
        $Order_id=$request->Order_id;
        $delete_order = DB::table('orders')
                                 ->where('Order_id',$Order_id)
                                 ->delete();
        $all_order = DB::table('orders')
                              ->orderBy('Status', 'desc')
                              ->get();
                               

                               if($delete_order){
                                    Toastr::success('Order Deleted', 'Delete', ["positionClass" => "toast-top-right"]);
                                    return redirect('/owner_orderreport');
                                    return view('owner/orderreport',compact('all_order'));
                                }
                                else{
                                    Toastr::error('Error!!', 'Delete', ["positionClass" => "toast-top-right"]);
                                    return Redirect()->back();
                                }
                                
        

    }
}
