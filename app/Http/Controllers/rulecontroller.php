<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Redirect;


class rulecontroller extends Controller
{
    //

    public function index(){

        $userid = Auth::id();
        $data = DB::table('shorturl')->where('userid', '=', $userid)->paginate(2);






        return view('rules', ['data' => $data]);

    }
    public function setpage(Request $request){



    $urlkey=request()->input('urlkey');

        $data = DB::table('shorturl')->where('urlkey', '=', $urlkey)->get();



        return view('rulespage', ['data' => $data]);

    }


    public function setdata(Request $request){



        $urlkey=request()->input('urlkey');
        $password=request()->input('password');
        $maxclick=request()->input('maxclick');
        $expiredate=request()->input('expire');
       $expire= strtotime($expiredate);

        $limit=request()->input('limit');
        $device=request()->input('device');
        $country=request()->input('country');
        $refer=request()->input('refer');
        DB::table('shorturl')->where('urlkey', $urlkey)->update(['password' => $password,'clicklimit' => $maxclick,'lasttime' => $expire,'devicetype' => $device,'country' => $country,'refer' => $refer,'iplimit' => $limit]);


        return Redirect::to('http://localhost:8000/rule');


    }





}
