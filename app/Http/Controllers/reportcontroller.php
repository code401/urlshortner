<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class reportcontroller extends Controller
{
    //


    public function index()
    {

        return view('report');
    }
    public function dataview(request $request)
    {

        $start = request()->input('start');
        $end = request()->input('end');

        $userid = Auth::id();


        $data = DB::table('shorturl')->join('stats', 'shorturl.id', '=', 'stats.urlid')->where('stats.userid','=', $userid)->where('stats.clickdate','>=', $start)->where('clickdate', '<=', $end)->get();



        return view('report', ['start'=>$start,'end'=>$end,'data' => $data]);
    }
}
