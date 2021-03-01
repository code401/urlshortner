<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use Illuminate\Http\Request;

class allshortcontroller extends Controller
{
    //
    public function dataview()
    {
        $userid = Auth::id();
        $data = DB::table('shorturl')->where('userid', '=', $userid)->paginate(5);




        return view('allshort', ['data' => $data]);
    }

public function deleteurl(){
    $urlkey = request()->input('urlkey');

    DB::table('shorturl')->where('urlkey', '=', $urlkey)->delete();
    return Redirect::to('http://localhost:8000/allshort');


}



}
