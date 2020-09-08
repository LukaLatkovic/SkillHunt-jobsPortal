<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function __construct()
    {
       
    }

    public function index(){

        return view('contact');
    }

    public function sendMessage(Request $request){

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
        

        //send mail
        Mail::to('contact@skillhunt.com')
              ->send(new ContactMail($data));
        
        return redirect('contact')->with('success','Message successfully sent!');
    }

}
