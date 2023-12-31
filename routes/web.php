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
    echo $ip;
    // get location from ipinfo.io
    $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
    echo $details->city; // -> is used to access the object property
    echo $details->country;
    echo $details->region;
    echo $details->loc;
    echo $details->postal;
    echo $details->timezone;
    echo $details->readme;
    // get location from ip-api.com
    $details = json_decode(file_get_contents("http://ip-api.com/json/{$ip}"));
    echo $details->city; // -> is used to access the object property
    echo $details->country;
    echo $details->region;
    echo $details->loc;
    echo $details->postal;

    // get location from ip-api.com
    $details = json_decode(file_get_contents("http://ip-api.com/json/{$ip}"));
    echo $details->city; // -> is used to access the object property
    echo $details->country;
    echo $details->region;
    echo $details->loc;
    echo $details->postal;
    echo $details->timezone;
    echo $details->readme;
    // get location from ip-api.com

});
