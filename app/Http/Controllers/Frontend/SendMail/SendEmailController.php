<?php

namespace App\Http\Controllers\Frontend\SendMail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

use App\Mail\NotifyMail;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller{

    public function index(Request $request){

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ],
        [
            'name.required' => 'Name can\'t be empty',
            'email.required' => 'Please Enter a valid email',
            'message.required' => 'Please Enter a brief message',
        ]);

        $mailData = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ];
         
        Mail::to('info@masstyles.com')->send(new NotifyMail($mailData));

        session()->flash('success', 'Thank you '.$request->name.' for emailing us!');
           
        // dd("Email is sent successfully.");
        return view('frontend.contact-us.contact-us');
        // return redirect()->route('contact.us.data')->with('info','Thank you for '.$request->name.' emailing us!');
    }
}
