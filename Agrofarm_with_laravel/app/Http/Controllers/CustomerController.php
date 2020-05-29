<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Cart;
use App\Http\Requests;
use Session;

class CustomerController extends Controller
{
    public function home()
    {
        return view('customer/customer_home');
    }

    public function shop()
    {
        return view('customer/customer_shop');
    }

    public function orderReport(Request $request)
    {
        $Cus_id=$request->session()->get('Cus_id');

        $all_orders=DB::table('orders')
            ->where('Cus_id',$Cus_id)
            ->get();

        return view('customer/my_orders',compact('all_orders'));    

    }

    public function about_us()
    {
        return view('customer/about_us');
    }


    public function logout(Request $request)
    {
        $request->session()->flush();

    	return redirect('/');

    }

    public function search_order(Request $request)
    {
        $Cus_id=$request->session()->get('Cus_id');
        $search= $request->search;
        $all_orders = DB::table('orders')
                                ->where('Fname','like',$search.'%')
                                ->where('Cus_id',$Cus_id)
                                ->get();
         
                                return view('customer/my_orders',compact('all_orders'));    

    }

    
    
}
