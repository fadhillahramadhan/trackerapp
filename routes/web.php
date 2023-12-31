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

    // Get IP Address from Cloudflare
    $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
    echo "IP Address: " . $ip . "<br>";

    // Get location from ipinfo.io
    $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
    echo "City: " . $details->city . "<br>";
    echo "Country: " . $details->country . "<br>";
    echo "Region: " . $details->region . "<br>";
    echo "Location: " . $details->loc . "<br>";

    // Get location from Google Maps
    $url = "https://www.google.co.id/maps/place/{$details->loc}";
    echo "Google Maps: " . $url . "<br>";

    // Get location from ip-api.com
    $ipApiDetails = json_decode(file_get_contents("http://ip-api.com/json/{$ip}"));

    // Check if the request was successful before accessing details
    echo json_encode($ipApiDetails);
    // {"status":"success","country":"Indonesia","countryCode":"ID","region":"YO","regionName":"Yogyakarta","city":"Yogyakarta","zip":"","lat":-7.8035,"lon":110.3646,"timezone":"Asia\/Jakarta","isp":"Telekomunikasi Indonesia","org":"Implementasi Telkom 2019","as":"AS7713 PT Telekomunikasi Indonesia","query":"2001:448a:4042:35cc:44c5:b531:cb90:f2e0"}
    if ($ipApiDetails->status == 'success') {
        echo "ISP: " . $ipApiDetails->isp . "<br>";
        echo "Browser: " . $_SERVER['HTTP_USER_AGENT'] . "<br>";
        echo "Operating System: " . $ipApiDetails->os . "<br>";
        echo "Device: " . $ipApiDetails->device . "<br>";
    } else {
        echo "Failed to get details from ip-api.com<br>";
    }
    // if ($ipApiDetails->status == 'success') {
    //     echo "ISP: " . $ipApiDetails->isp . "<br>";
    //     echo "Browser: " . $_SERVER['HTTP_USER_AGENT'] . "<br>";
    //     echo "Operating System: " . $ipApiDetails->os . "<br>";
    //     echo "Device: " . $ipApiDetails->device . "<br>";
    // } else {
    //     echo "Failed to get details from ip-api.com<br>";
    // }
});
