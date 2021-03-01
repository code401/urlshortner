<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;

class signupcontroller extends Controller
{
    //



    public function check(Request $request){


        $fullurl=url()->full();
        $code=substr($fullurl,36);

        $email = DB::table('users')->where('code',$code)->value('email');

            DB::table('users')
                ->where('email', $email)
                ->update(['status' => 1]);


        $minutes = 11;
        $response = new Response('Hello World');
        $response->withCookie(cookie('name', '$email', $minutes));


        return view('newuserpasswordsetup');
        }

    public function setpass(Request $request){

        $pass=request()->input('password');
        $email = $request->cookie('name');



        DB::table('users')
            ->where('email', $email)
            ->update(['password'=> $pass]);




        return view('newuserwelcome');
    }



}
