<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TrackerController;
use App\Http\Controllers\BotController;

use Telegram\Bot\Laravel\Facades\Telegram;

use Illuminate\Http\Request;


Route::get('/', [TrackerController::class, 'show']);
Route::get('/bot', [BotController::class, 'get_me']);

Route::get('/bot/set_webhook', function () {
    $url = env('TELEGRAM_WEBHOOK_URL');

    Telegram::setWebhook(['url' => $url]);

    echo $url;
});

Route::post('/webhook', function (Request $request) {
    try {
        //code...

        Telegram::commandsHandler(true);

        $tel = Telegram::getWebhookUpdate();

        $json = json_encode($tel);
        $datetime = date('Y-m-d-H-i-s');
        $file = fopen("json/update-{$datetime}.json", 'w');
        fwrite($file, $json);
        fclose($file);

        return 'ok';
    } catch (\Throwable $th) {
        $response = Telegram::sendMessage([
            'chat_id' => '5265288602',
            'text' => $th->getMessage()
        ]);
    }
});

Route::get('/bot/remove_webhook', function () {
    $response = Telegram::removeWebhook();

    echo $response;
});

Route::get('/show', function () {
    $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
    echo "IP Address: " . $ip . "<br>";

    $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
    echo "City: " . $details->city . "<br>";
    echo "Country: " . $details->country . "<br>";
    echo "Region: " . $details->region . "<br>";
    echo "Location: " . $details->loc . "<br>";

    $url = "https://www.google.co.id/maps/place/{$details->loc}";
    echo "Google Maps: " . $url . "<br>";

    $ipApiDetails = json_decode(file_get_contents("http://ip-api.com/json/{$ip}"));

    if ($ipApiDetails->status == 'success') {
        echo "ISP: " . $ipApiDetails->isp . "<br>";
        echo "Browser: " . $_SERVER['HTTP_USER_AGENT'] . "<br>";
    } else {
        echo "Failed to get details from ip-api.com<br>";
    }
});
