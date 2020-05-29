<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Cart;
use App\Http\Requests;
use Session;


class OwnerProductController extends Controller
{
    public function show_crops()
    {
        $all_crops = DB::table('food')
                                ->where('Type','Crops')
                                ->get();
         
                                return view('owner/all_crops',compact('all_crops'));

    }
      public function show_vegetables()
    {
        $all_vegetables = DB::table('food')
                                ->where('Type','Vegetable')
                                ->get();
         
                                return view('owner/all_vegetables',compact('all_vegetables'));

    }
      public function show_fruits()
    {
        $all_fruits = DB::table('food')
                                ->where('Type','Fruit')
                                ->get();
         
                                return view('owner/all_fruits',compact('all_fruits'));

    }



    public function view_product($Fid,$Type) 
    {
        $product_details = DB::table('food')
                                ->where('Fid',$Fid)
                                ->first();

        $product_review = DB::table('review')
        ->where('Fid',$Fid)
        ->get();
        
        $may_like =DB::table('food')
            ->where('Type',$Type)
            ->inRandomOrder()
            ->limit(2)
            ->get();

         
             return view('owner/view_product',compact('product_details','product_review','may_like'));

    }
}
