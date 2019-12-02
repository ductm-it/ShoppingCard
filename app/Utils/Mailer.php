<?php
namespace App\Utils;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class Mailer
{
    
    
    public static function sendEmail($receiverEmail,$subject,$content)
    {
       foreach($receiverEmail as $email)
       {
        Mail::to($email)->send(new SendMail($content));
       }
    }
}
