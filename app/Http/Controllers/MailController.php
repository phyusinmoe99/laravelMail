<?php

namespace App\Http\Controllers;

use App\Mail\SendingEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index(){
        $mailData = [
            'title' => 'Mail Testing',
            'body' => 'this is mail sending'
        ];

        // Mail::to('phyusinmoeedu@gmail.com')->send(new SendingEmail($mailData));

        // dd("email send successfully");
        try {
            Mail::to('phyusinmoeedu@gmail.com')->send(new SendingEmail($mailData));
            Log::info("Email sent successfully");
            return "Email sent successfully";
        } catch (\Exception $e) {
            Log::error("Email sending failed: " . $e->getMessage());
            return "Email sending failed";
        }
    }
}
