<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Cart;
use App\Http\Requests;
use Session;


class CustomerProductController extends Controller
{
    public function show_crops()
    {
        $all_crops = DB::table('food')
                                ->where('Type','Crops')
                                ->get();
         
                                return view('customer/all_crops',compact('all_crops'));

    }

    public function show_vegetable()
    {
        $all_crops = DB::table('food')
                                ->where('Type','Vegetable')
                                ->get();
         
                                return view('customer/all_crops',compact('all_crops'));

    }

    public function show_fruit()
    {
        $all_crops = DB::table('food')
                                ->where('Type','Fruit')
                                ->get();
         
                                return view('customer/all_crops',compact('all_crops'));

    }

    public function view_product($Fid)
    {
        $product_details = DB::table('food')
                                ->where('Fid',$Fid)
                                ->first();

        $product_review = DB::table('review')
        ->where('Fid',$Fid)
        ->get();
        
        $may_like =DB::table('food')
            ->inRandomOrder()
            ->limit(2)
            ->get();

         
             return view('customer/view_product',compact('product_details','product_review','may_like'));

    }

    public function add_review(Request $request,$Fid)
    {
        $product_details = DB::table('food')
                                ->where('Fid',$Fid)
        
                                ->first();
        $Cus_id=$request->session()->get('Cus_id');
                        
        $cus_info=DB::table('customer')
        ->where('Cus_id',$Cus_id)
        ->first();

        $data=array();            
        $data['Cus_id']=$Cus_id;          
        $data['name']=$cus_info->name;
        $data['Fid']=$product_details->Fid;
        $data['Fname']=$product_details->Fname;
        $data['comment']=$request->review;

        DB::table('review')
            ->insert($data);

        
            return redirect('customer_view_product/'.$product_details->Fid);

    }

    public function search_product(Request $request)
    {
       $search= $request->search;
        $all_crops = DB::table('food')
                                ->where('Fname','like',$search.'%')
                                ->get();
         
                                return view('customer/all_crops',compact('all_crops'));
        
    }
    


}
