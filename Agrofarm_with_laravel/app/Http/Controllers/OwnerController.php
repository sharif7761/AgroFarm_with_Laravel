<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Cart;
use App\Http\Requests;
use Session;

class OwnerController extends Controller
{
    public function home()
    {
        return view('owner/owner_home');
    }

    public function shop()
    {
        return view('owner/owner_shop');
    }

    public function aboutus()
    {
        return view('owner/aboutus');
    }
    
    public function profile(Request $request)
    {
        $Uid = session()->get('Uid');
        $user = DB::table('user')
                                ->where('Uid',$Uid)
                                ->get()
                                ->first();
                                return view('owner/profile',compact('user'));
    }
}
