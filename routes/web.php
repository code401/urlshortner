<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\urlshortcontroller;
use App\Http\Controllers\signupcontroller;
use App\Http\Controllers\urlredirectcontroller;
use App\Http\Controllers\allshortcontroller;
use App\Http\Controllers\customurlcontroller;
use App\Http\Controllers\urldatacontroller;
use App\Http\Controllers\qrcodecontroller;
use App\Http\Controllers\changeurlcontroller;
use App\Http\Controllers\rulecontroller;
use App\Http\Controllers\backupurlcontroller;
use App\Http\Controllers\reportcontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', function () {
    return view('index');
});



Route::get('makeshorturl', function () {
    return view('makeshorturl');
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});

Route::get('customurl', function () {
    return view('customurl');
});
Route::get('changeurl', function () {
    return view('changeurl');
});
Route::get('test', function () {
    return view('bki');
});

Route::get('backupurl', [backupurlcontroller::class, 'dataview']);
Route::post('backupurlpage', [backupurlcontroller::class, 'setpage'])->name('setpage.backupurl');
Route::post('setbackupurl', [backupurlcontroller::class, 'change'])->name('change.backup');

Route::post('checkpassword', [urlredirectcontroller::class, 'redirect'])->name('check.password');

Route::post('customurl', [customurlcontroller::class, 'createcustom'])->name('customurl.create');
Route::post('changeurl', [changeurlcontroller::class, 'change'])->name('change.url');
Route::get('allshort', [allshortcontroller::class, 'dataview']);
Route::post('allshort', [allshortcontroller::class, 'deleteurl'])->name('delete.url');
//Route::get('/confirmsignup/{code}', [signupcontroller::class, 'check']);
Route::get('urldata', [urldatacontroller::class, 'dataview']);

Route::post('urldata', [urldatacontroller::class, 'showurldata'])->name('data.url');
Route::get('qrcode', [qrcodecontroller::class, 'dataview']);
Route::post('qrcode', [qrcodecontroller::class, 'download'])->name('download.qrcode');
Route::post('makeshorturl', [urlshortcontroller::class, 'url'])->name('url.short');
Route::post('urlshort', [urlshortcontroller::class, 'url'])->name('userurl.short');
Route::get('rule', [rulecontroller::class, 'index'])->name('rule.url');
Route::post('setrule', [rulecontroller::class, 'setpage'])->name('set.rule');
Route::post('setruleconfirm', [rulecontroller::class, 'setdata'])->name('setdata.rule');
Route::get('report', [reportcontroller::class, 'index']);
Route::post('report', [reportcontroller::class, 'dataview'])->name('data.report');
Route::get('urlshort', function () {
    return view('urlshort');
})->name('urlshort.user');

Route::get('timelimit', function () {
    return view('timelimit');
});

Route::get('terms', function () {
    return view('terms');
})->name('terms.limit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::get('/{any}', [urlredirectcontroller::class, 'redirect'])->where('any', '.*');



