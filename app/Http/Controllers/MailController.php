<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail()
    {
        // return new WelcomeMail(); // This is for preview in the browser

        // Mail::to('hello@demo.com')->send( new WelcomeMail());

        // Queue the mail

        Mail::to('hello@demo.com')-> queue(new WelcomeMail());

        
    }
}
