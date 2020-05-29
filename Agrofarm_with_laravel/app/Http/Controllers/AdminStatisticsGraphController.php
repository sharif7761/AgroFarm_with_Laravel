<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Cart;
use App\Http\Requests;
use Session;
use Toastr;

class AdminStatisticsGraphController extends Controller 
{
    

    function index()
       
     {
     
     return view('admin/statistics');
    }
}
