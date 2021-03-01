<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Illuminate\Http\Request;

class urldatacontroller extends Controller
{
    //
    public function showurldata(Request $request){

        $urlid=request()->input('urlid');
        $totalclick = DB::table('stats')->get()->where('urlid', '=', $urlid)->count();
        $urlkey = DB::table('shorturl')->where('id', '=', $urlid)->value('urlkey');
        $failclick = DB::table('stats')->get()->where('failclick', '=', '1')->where('urlid', '=', $urlid)->count();
        $dailyclick = DB::table('stats')->get()->where('clickdate', '=',  date("Y-m-d"))->where('urlid', '=', $urlid)->count();
        $pc = DB::table('stats')->get()->where('device', '=', 'computer')->where('urlid', '=', $urlid)->count();
        $mobile = DB::table('stats')->get()->where('device', '=', 'mobile')->where('urlid', '=', $urlid)->count();
        $countrylist = DB::table('stats')->select('country')->distinct()->where('urlid', '=', $urlid)->get();
        $countryclick=[];
        $i=0;
        foreach($countrylist as $key => $value){

            $countryname=$value->country;
            $countryclick[++$i] = DB::table('stats')->get()->where('country', '=', $countryname)->where('urlid', '=', $urlid)->count();


        }


    $j=0;

            $browserclick[++$j] = DB::table('stats')->get()->where('browser', '=', 'Chrome')->where('urlid', '=', $urlid)->count();
        $browserclick[++$j] = DB::table('stats')->get()->where('browser', '=', 'Firefox')->where('urlid', '=', $urlid)->count();
        $browserclick[++$j] = DB::table('stats')->get()->where('browser', '=', 'Handheld Browser')->where('urlid', '=', $urlid)->count();



        $referlist = DB::table('stats')->select('referer')->distinct()->where('urlid', '=', $urlid)->get();
        $referclick=[];
        $l=0;
        foreach($referlist as $key => $value){

            $refername=$value->referer;
            $referclick[++$l] = DB::table('stats')->get()->where('referer', '=', $refername)->where('urlid', '=', $urlid)->count();


        }





        $t=0;

        $osclick[++$t] = DB::table('stats')->get()->where('os', '=', 'Windows')->where('urlid', '=', $urlid)->count();
        $osclick[++$t] = DB::table('stats')->get()->where('os', '=', 'Mac')->where('urlid', '=', $urlid)->count();
        $osclick[++$t] = DB::table('stats')->get()->where('os', '=', 'Linux')->where('urlid', '=', $urlid)->count();
        $osclick[++$t] = DB::table('stats')->get()->where('os', '=', 'Ios')->where('urlid', '=', $urlid)->count();
        $osclick[++$t] = DB::table('stats')->get()->where('os', '=', 'Android')->where('urlid', '=', $urlid)->count();




        return view('urldata', ['urlkey' => $urlkey,'totalclick' => $totalclick,'failclick' => $failclick,'dailyclick'=>$dailyclick,'pc'=>$pc,'mobile'=>$mobile,'countrylist'=>$countrylist,'countryclick'=>$countryclick,'browserclick'=>$browserclick,'referlist'=>$referlist,'referclick'=>$referclick,'osclick'=>$osclick]);


    }

    public function dataview()
    {
        $userid = Auth::id();
        $data = DB::table('shorturl')->get()->where('userid', '=', $userid);




        return view('urldata', ['data' => $data]);
    }
}
