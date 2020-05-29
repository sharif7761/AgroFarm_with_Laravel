<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Cart;
use App\Http\Requests;
use Session;


class DistributorController extends Controller
{
    public function home()
    {
        return view('distributor/distributor_home');
    }

    public function aboutus()
    {
        return view('distributor/aboutus');
    }

    public function shop(Request $request)
    {
       
        return view('distributor/distributor_shop');
    }

    public function orderReport(Request $request)
    {
        $Uid=$request->session()->get('Uid');

        $all_orders=DB::table('dorders')
            ->where('distributor_id',$Uid)
            ->get();

        return view('distributor/my_orders',compact('all_orders'));    

    }

    public function profile(Request $request)
    {
        $Uid = session()->get('Uid');
        $user = DB::table('user')
                                ->where('Uid',$Uid)
                                ->get()
                                ->first();
                                return view('distributor/profile',compact('user'));
    }

}
