<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Support\Str;
use DB;
use Illuminate\Http\Request;

class mailcontroller extends Controller
{
    //

    public function basic_email(Request $request) {

        $email=request()->input('email');
        $rcode= Str::random($length = 8);
        $lnk="http://localhost:8000/confirmsignup/".$rcode;

        $data = array('url'=>$lnk);

        DB::table('users')->insert(
            ['email' => $email, 'code' => $rcode,'status'=>0,'password'=>"test",]
        );

        Mail::send(['text'=>'mail'], $data, function($message) use ($email) {
            $message->to($email, 'verify email')->subject
            ('verification for sign up');
            $message->from('bkupzero1@gmail.com','url shortner');
        });




        return view('verifyemail');
    }


}
