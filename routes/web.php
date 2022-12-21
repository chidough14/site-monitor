<?php

use App\Events\CheckSite;
use App\Models\Url;
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

Route::get('/test', function () {
    

    $urls = Url::all();
    $urls->each(function ($url) {
        //logger($url->url);
        //dump($url->url);

        event(new CheckSite($url->url));

        //dump($urlChecker->checkUrlStatus($url->url));
    });

    //dd($urlChecker->checkUrlStatus($url));
});
