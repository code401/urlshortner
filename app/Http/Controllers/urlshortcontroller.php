<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Auth;



class urlshortcontroller extends Controller
{
    //


    public function url(Request  $request){
        $originalurl=request()->input('url');
        $randstring= Str::random($length = 8);
        $shorturl="http://localhost:8000/".$randstring;
        if (Auth::check()) {
            $timelimit=0;
            $userid = Auth::id();
            DB::table('shorturl')->insert(
                ['originalurl' => $originalurl, 'urlkey' => $randstring, 'lasttime' => $timelimit,'userid'=>$userid]
            );
            DB::table('shorturl')->where('urlkey', $randstring)->update(['devicetype' => 'all','country' => 'all','refer' => 'all','iplimit' => 'no']);
            return view('urlshort', compact('shorturl'));

        }else {
            $day = 60 * 60 * 24;
            $daylimit = $day * 10;
            $timelimit = time() + $daylimit;
                    $userid=0;

            DB::table('shorturl')->insert(
                ['originalurl' => $originalurl, 'urlkey' => $randstring, 'lasttime' => $timelimit,'userid' => 0]
            );

            DB::table('shorturl')->where('urlkey', $randstring)->update(['devicetype' => 'all','country' => 'all','refer' => 'all','iplimit' => 'no']);




            return view('makeshorturl', compact('shorturl'));
        }


    }




}
