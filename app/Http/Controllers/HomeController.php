<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use Illuminate\Http\Request;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userid = Auth::id();
        $count = DB::table('shorturl')->where('userid',$userid)->count();
        $totalclick = DB::table('stats')->where('userid',$userid)->count();
        $urllist = DB::table('stats')->select('urlid')->where('userid',$userid)->distinct()->get();

        $maxurlidtemp=0;
        $maxurl='';
        foreach($urllist as $key => $value){

            $urlid=$value->urlid;
            $maxurlidcount = DB::table('stats')->get()->where('urlid', '=', $urlid)->count();
            if($maxurlidcount>=$maxurlidtemp){
                $maxurlidtemp=$maxurlidcount;
                $maxurl=$urlid;

            }

        }

        $maxurlclick=$maxurlidtemp;
        if(!($maxurl=='')) {
            $popurl = DB::table('shorturl')->where('id', '=', $maxurl)->value('urlkey');

        }


        $hourdata='';
        for($t=0;$t<=intval(date("G"));$t++)
        {
            $clickcountinhour = DB::table('stats')->where('clickhour',$t)->where('userid',$userid)->count();
            if($clickcountinhour>0){}
            else{
                $clickcountinhour=0;
            }
            $hourdata=$hourdata.'['.$t.','.$clickcountinhour.']'.',';

        }





        return view('home', compact('count','totalclick','popurl','maxurlclick','hourdata'));
    }



}
