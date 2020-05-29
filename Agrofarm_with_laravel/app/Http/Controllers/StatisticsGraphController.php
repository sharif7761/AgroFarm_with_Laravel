<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Cart;
use App\Http\Requests;
use Session;
use Toastr;

class StatisticsGraphController extends Controller 
{
    function index()
       
     {
     $data = DB::table('transaction')
       ->select(DB::raw('TRType as TRType'),
        DB::raw('count(*) as number'))
       ->groupBy('TRType')
       ->get();
     $array[] = ['Type', 'Number'];
     foreach($data as $key => $value)
     {
      $array[++$key] = [$value->TRType, $value->number];
     }
     return view('owner/statistics')->with('TRType', json_encode($array));
    }

}



