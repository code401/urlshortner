<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Illuminate\Support\Facades\Redirect;


use Illuminate\Http\Request;

class backupurlcontroller extends Controller
{
    //


    public function dataview()
    {
        $userid = Auth::id();
        $data = DB::table('shorturl')->get()->where('userid', '=', $userid);




        return view('backupurl', ['data' => $data]);
    }

    public function setpage(Request $request){

        $urlkey = request()->input('urlkey');


        return view('setbackupurl', ['urlkey' => $urlkey]);




    }

    public function change(Request $request){

        $urlkey = request()->input('urlkey');
        $backupurl = request()->input('backupurl');






            $data=DB::table('shorturl')->where('urlkey', $urlkey)->update(['backupurl' => $backupurl]);


        return Redirect::to('http://localhost:8000/backupurl');




    }


}
