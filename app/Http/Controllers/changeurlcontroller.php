<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
class changeurlcontroller extends Controller
{
    //

    public function change(request $request){

        $shorturl = request()->input('url');
        $fullurl = request()->input('fullurl');
        $userid = Auth::id();

        $key=substr($shorturl,22);

        $data = DB::table('shorturl')->where('urlkey', '=', $key)->where('userid', '=', $userid)->count();
        if ($data > 0) {
            $data=DB::table('shorturl')->where('urlkey', $key)->update(['originalurl' => $fullurl]);
            $message='Original url changed';




        }
        else{
            $message='short url not valid';

        }


        return view('changeurl', ['message' => $message]);

    }
}
