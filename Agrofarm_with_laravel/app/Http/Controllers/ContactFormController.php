<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Cart;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Mail\ContactMail;

class ContactFormController extends Controller
{
    public function create()
    {
        
        return view('customer/contact');
    }

    public function show(Request $request)
    {
        $data=request()->validate([
            'name'=>'required',
            'email'=>'required|email',
            'message'=>'required'
        ]);
      //  dd(request()->all());
      Mail::to('test@test.com')->send(new ContactMail($data));
      $request->session()->flash('Success_message','Thank you for Contacting Us!!We will Contact you soon!!');
                    
      return redirect('/contact');
    }

    
}
