<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrackerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [TrackerController::class, 'show']);
// Route::get()
// show echo shwo
Route::get('/show', function () {
    // echo "show";
    // get location from cloudflare
    $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
    echo $ip . "<br>";
    // get location from ipinfo.io
    $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
    echo $details->city . "<br>"; // -> is used to access the object property
    echo $details->country . "<br>";
    echo $details->region . "<br>";
    echo $details->loc . "<br>";


    // get location from google maps
    $url = "https://www.google.co.id/maps/place/{$details->loc}";
    echo $url . "<br>";


    // get location from ip-api.com

});
