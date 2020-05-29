<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Cart;
use App\Http\Requests;
use Session;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        $request->session()->flush();
         
        return redirect('/');
        

    }
}
