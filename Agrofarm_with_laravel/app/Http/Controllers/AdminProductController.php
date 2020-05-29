<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Cart;
use App\Http\Requests;
use Session;
use Toastr; 

class AdminProductController extends Controller
{
    public function show_crops()
    {
        $all_crops = DB::table('food')
                                ->where('Type','Crops')
                                ->get();
         
                                return view('admin/all_crops',compact('all_crops'));

    }

    public function search_crops(Request $request)
    {
        $search= $request->search;
        $all_crops = DB::table('food')
                                 ->where('Fname','like',$search.'%')
                                 ->where('Type',"Crops")
                                ->get();

                               if(count($all_crops)>0){
                                    Toastr::success('Search result generated', 'Search', ["positionClass" => "toast-top-right"]);
                                    
                                    
                                    return view('admin/all_crops',compact('all_crops'));
                                    
                                }
                                else{
                                    Toastr::error('No match found', 'Search', ["positionClass" => "toast-top-right"]);
                                    return redirect('/admin_crops');
                                }
                                
        

    }

    

      public function show_vegetables()
    {
        $all_vegetables = DB::table('food')
                                ->where('Type','Vegetable')
                                ->get();
         
                                return view('admin/all_vegetables',compact('all_vegetables'));

    }

    public function search_vegetables(Request $request)
    {
        $search= $request->search;
        $all_vegetables = DB::table('food')
                                 ->where('Fname','like',$search.'%')
                                 ->where('Type',"Vegetable")
                                ->get();

                               if(count($all_vegetables)>0){
                                    Toastr::success('Search result generated', 'Search', ["positionClass" => "toast-top-right"]);
                                    
                                    
                                    return view('admin/all_vegetables',compact('all_vegetables'));
                                    
                                }
                                else{
                                    Toastr::error('No match found', 'Search', ["positionClass" => "toast-top-right"]);
                                    return redirect('/admin_vegetables');
                                }
                                
        

    }

      public function show_fruits()
    {
        $all_fruits = DB::table('food')
                                ->where('Type','Fruit')
                                ->get();
         
                                return view('admin/all_fruits',compact('all_fruits'));

    }

    public function search_fruits(Request $request)
    {
        $search= $request->search;
        $all_fruits = DB::table('food')
                                 ->where('Fname','like',$search.'%')
                                 ->where('Type',"Fruit")
                                ->get();

                               if(count($all_fruits)>0){
                                    Toastr::success('Search result generated', 'Search', ["positionClass" => "toast-top-right"]);
                                    
                                    
                                    return view('admin/all_fruits',compact('all_fruits'));
                                    
                                }
                                else{
                                    Toastr::error('No match found', 'Search', ["positionClass" => "toast-top-right"]);
                                    return redirect('/admin_fruits');
                                }
                                
        

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

         
             return view('admin/view_product',compact('product_details','product_review','may_like'));

    }
}
