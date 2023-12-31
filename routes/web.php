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
    $url = "http://maps.googleapis.com/maps/api/geocode/json?latlng={$details->loc}&sensor=false";
    $data = @file_get_contents($url);
    $jsondata = json_decode($data, true);
    $city = $jsondata["results"][0]["address_components"][2]["long_name"];
    $country = $jsondata["results"][0]["address_components"][5]["long_name"];
    // coordinates
    $lat = $jsondata["results"][0]["geometry"]["location"]["lat"];
    $lng = $jsondata["results"][0]["geometry"]["location"]["lng"];

    echo $lat . "<br>";
    echo $city . "<br>";
    echo $country . "<br>";
    echo $url . "<br>";


    // get location from ip-api.com

});
