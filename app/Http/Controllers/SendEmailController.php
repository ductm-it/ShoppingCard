<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Providers\shoes;
use App\Mail\SendMail;

class SendEmailController extends Controller
{
    public function index()
    {
        $cart = Cart::content();
        return view('adminpage.SendEmailView', array('cart' => $cart, 'title' => 'Welcome', 'description' => '', 'page' => 'home'));
        // return view('adminpage.SendEmailView');
    }
    function send(Request $request)
    {
        $nn=[];
                $this->validate(
            $request,
            [
                'name'      => 'required',
                'email'     => 'required|email',
                // 'message'   => 'required'
            ]);
            $data=array(
                    'name' => $request->input('name'),
                    // 'message' =>$request->input('message'),
                    'email'=>$request->input('email'),
                    'product'=>Cart::content(),
            );
        
        Mail::to($request->input('email'))->send(new SendMail($data));
        
        return redirect('/thankyou');
        
    }
}
