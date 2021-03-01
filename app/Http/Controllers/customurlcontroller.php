<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class customurlcontroller extends Controller
{
    //

    public function createcustom(Request $request)

    {
        $userid = Auth::id();
        $oldurl = request()->input('oldurl');
        $key=substr($oldurl,22);


        $newkey = request()->input('newkey');
        $data = DB::table('shorturl')->get()->where('urlkey', '=', $newkey)->count();
        if ($data > 0) {
            $message = "Custom Name not available,try another";
            return view('customurl', ['message' => $message]);


        } else {

            $data = DB::table('shorturl')->where('urlkey', '=', $key)->where('userid', '=', $userid)->count();
            if ($data > 0) {
                $data=DB::table('shorturl')->where('urlkey', $key)->update(['urlkey' => $newkey]);
                $newurl='http://localhost:8000/'.$newkey;

                return view('customurl', ['newurl' => $newurl]);


            }else {

                $message = "Url not valid";
                return view('customurl', ['message' => $message]);
            }
        }


    }
}
