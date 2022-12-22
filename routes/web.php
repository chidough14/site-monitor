<?php

use App\Events\CheckSite;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/url/re-activate/{url}', function (Request $request, Url $url) {
    if (!$request->hasValidSignature()) abort(401);
    
    $url->failing = false;

    $url->save();

    return redirect('/');
 
})->name('re-activate');

Route::get('/test', function () {
    

    $urls = Url::all();
    $urls->each(function ($url) {

        event(new CheckSite($url));
    });
});

