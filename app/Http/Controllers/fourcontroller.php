<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class fourcontroller extends Controller
{
    //

    public function dataview()
    {
        $userid = Auth::id();
        $data = DB::table('stats')->get()->where('userid', '=', $userid);




        return view('allshort', ['data' => $data]);
    }

}
