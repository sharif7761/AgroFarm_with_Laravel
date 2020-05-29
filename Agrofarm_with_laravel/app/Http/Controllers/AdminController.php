<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Cart;
use App\Http\Requests;
use Session;


class AdminController extends Controller
{
    public function home()
    {
        return view('admin/admin_home');
    }

    public function shop()
    {
        return view('admin/admin_shop');
    }

    public function aboutus()
    {
        return view('admin/aboutus');
    }

    public function profile(Request $request)
    {
        $Uid = session()->get('Uid');
        $user = DB::table('user')
                                ->where('Uid',$Uid)
                                ->get()
                                ->first();
                                return view('admin/profile',compact('user'));
    }
}
