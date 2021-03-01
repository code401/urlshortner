<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class qrcodecontroller extends Controller
{
    //

    public function dataview()
    {
        $userid = Auth::id();
        $data = DB::table('shorturl')->where('userid', '=', $userid)->get();




        return view('qrcode', ['data' => $data]);
    }

        public function download(Request $request){
            $keydata = request()->input('url');
            $shorturl = 'http://localhost:8000/'.$keydata;
            $url = 'https://chart.googleapis.com/chart?';
            $chs = 'chs=200x200';
            $cht = 'cht=qr';
            $chl = 'chl='.urlencode($shorturl);

            $qstring = $url ."&". $chs ."&". $cht ."&". $chl;

            $data = file_get_contents($qstring);
            $filename=$keydata.'.png';
            $f = fopen($filename, 'w');
            fwrite($f, $data);
            fclose($f);

            $file_url = 'http://localhost/internproject/urlshortner/public/'.$filename;
            header('Content-Type: application/octet-stream');
            header("Content-Transfer-Encoding: Binary");
            header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\"");
            readfile($file_url);

            $userid = Auth::id();
            $data = DB::table('shorturl')->get()->where('userid', '=', $userid);



            return view('qrcode', ['data' => $data]);

        }


}
