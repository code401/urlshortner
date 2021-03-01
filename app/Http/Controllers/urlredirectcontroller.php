<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;



class urlredirectcontroller extends Controller
{
    //

    public function redirect(Request $request){
        if(request()->input('password')=='') {
            $fullurl = url()->full();

            $urlkey = substr($fullurl, 22);
        }else{

            $urlkey=request()->input('urlkey');

        }
         $timelimit = DB::table('shorturl')->where('urlkey',$urlkey)->value('lasttime');

        $urlid = DB::table('shorturl')->where('urlkey',$urlkey)->value('id');
        if($timelimit>=time() || $timelimit == 0 ) {
            $url = DB::table('shorturl')->where('urlkey', $urlkey)->value('originalurl');






            $user_agent = $_SERVER['HTTP_USER_AGENT'];

            $os_platform =   "Bilinmeyen İşletim Sistemi";
            $os_array =   array(
                '/windows nt 10/i'      =>  'Windows',
                '/windows nt 6.3/i'     =>  'Windows',
                '/windows nt 6.2/i'     =>  'Windows',
                '/windows nt 6.1/i'     =>  'Windows',
                '/windows nt 6.0/i'     =>  'Windows',
                '/windows nt 5.2/i'     =>  'Windows',
                '/windows nt 5.1/i'     =>  'Windows',
                '/windows xp/i'         =>  'Windows',
                '/windows nt 5.0/i'     =>  'Windows',
                '/windows me/i'         =>  'Windows',
                '/win98/i'              =>  'Windows',
                '/win95/i'              =>  'Windows',
                '/win16/i'              =>  'Windows',
                '/macintosh|mac os x/i' =>  'Mac',
                '/mac_powerpc/i'        =>  'Mac',
                '/linux/i'              =>  'Linux',
                '/ubuntu/i'             =>  'Linux',
                '/iphone/i'             =>  'Ios',
                '/ipod/i'               =>  'Ios',
                '/ipad/i'               =>  'Ios',
                '/android/i'            =>  'Android',
                '/blackberry/i'         =>  'BlackBerry',
                '/webos/i'              =>  'Mobileos'
            );

            foreach ( $os_array as $regex => $value ) {
                if ( preg_match($regex, $user_agent ) ) {
                    $os_platform = $value;
                }
            }





            $user_agent = $_SERVER['HTTP_USER_AGENT'];

            $browser        = "Bilinmeyen Tarayıcı";
            $browser_array  = array(
                '/msie/i'       =>  'Internet Explorer',
                '/firefox/i'    =>  'Firefox',
                '/safari/i'     =>  'Safari',
                '/chrome/i'     =>  'Chrome',
                '/edge/i'       =>  'Edge',
                '/opera/i'      =>  'Opera',
                '/netscape/i'   =>  'Netscape',
                '/maxthon/i'    =>  'Maxthon',
                '/konqueror/i'  =>  'Konqueror',
                '/mobile/i'     =>  'Handheld Browser'
            );

            foreach ( $browser_array as $regex => $value ) {
                if ( preg_match( $regex, $user_agent ) ) {
                    $browser = $value;
                }
            }

















            $os= $os_platform;




            $useragent=$_SERVER['HTTP_USER_AGENT'];
            if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))

            {
                $device='mobile';
            }
            else{
                $device='computer';
            }




            $query = @unserialize (file_get_contents('http://ip-api.com/php/'));
            if ($query && $query['status'] == 'success') {
                $country=$query['country'] ;
                $userip=  $query['query'] ;
            }














            if(isset($_SERVER['HTTP_REFERER'])){
                $referer=$_SERVER['HTTP_REFERER'];

                if (stripos($referer, "localhost") !== false) {
                    $referer='direct';


                }



                }else{
                $referer='direct';

            }
            if(request()->input('password')!='') {
                $urlkey = request()->input('urlkey');
            }
            $checkpassword = DB::table('shorturl')->where('urlkey',$urlkey)->value('password');
            if($checkpassword>0&&empty(request()->input('password'))){

              return  view('passwordprotect',compact('urlkey'));
            }

            if(request()->input('password')!='') {
                $inputpassword = request()->input('password');

                if($checkpassword!=$inputpassword){
                    $message="wrong password";
                    return view('passwordprotect',compact('message','urlkey','checkpassword'));

                }


            }

            $userclicklimit = DB::table('shorturl')->where('id',$urlid)->value('clicklimit');
            $userclickstatus = DB::table('stats')->where('urlid',$urlid)->count();
            if(($userclicklimit>=($userclickstatus+1))||$userclicklimit==''){



            }else{

        return view('clicklimit');

            }

            $userdevicelimit = DB::table('shorturl')->where('id',$urlid)->value('devicetype');
            if($userdevicelimit=="all"){

            }else{
            if($userdevicelimit==$device){


            }
            else{
                return abort(404);

            }
          }

            $usercountrylimit = DB::table('shorturl')->where('id',$urlid)->value('country');
            if($usercountrylimit=="all"){

            }else {
                if ($usercountrylimit == $country) {

                } else {

                    return abort(404);



                }
            }

            $userreferlimit = DB::table('shorturl')->where('id',$urlid)->value('refer');
            if($userreferlimit=='all'){

            }else{
                if ($userreferlimit == $referer) {

                } else {

                   return abort(404);



                }


            }


            $useriplimit = DB::table('shorturl')->where('id',$urlid)->value('iplimit');


            $useripstatus = DB::table('stats')->where('userip',$userip)->where('urlid',$urlid)->count();
            if($useriplimit>=($useripstatus+1)||$useriplimit=="no"){



            }else{


                return abort(404);

            }

            $clickhour=intval(date("G"));

            $host=parse_url($url);

            if(gethostbyname($host['host']) != $host['host'] )
            {
                $failclick=0;

            }
            else
            {
                $backupurl = DB::table('shorturl')->where('urlkey',$urlkey)->value('backupurl');
                if(!empty($backupurl)){

                    $url = $backupurl;
                    $host=parse_url($url);

                    if(gethostbyname($host['host']) != $host['host'] )
                    {
                        $failclick=0;

                    }
                    else
                    {
                        $failclick=1;
                    }





                }
                else{
                    $failclick=1;

                }

            }

            $userid = DB::table('shorturl')->where('urlkey',$urlkey)->value('userid');
            $clicktime=date("h:i A");
            DB::table('stats')->insert(
                ['urlid' => $urlid, 'clicktime' => $clicktime, 'userid' => $userid,  'failclick' => $failclick, 'clickconfirm' => 1, 'userip' => $userip, 'os' => $os,'device' => $device, 'browser' => $browser, 'country' => $country,'referer' => $referer, 'clickdate' => date("Y-m-d"), 'clickhour' => $clickhour]
            );



           return Redirect::to($url);



        }else{

            return Redirect::to('http://localhost:8000/timelimit');

        }







    }




}
