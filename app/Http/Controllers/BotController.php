<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Telegram\Bot\Api;

class BotController extends Controller
{
    protected $telegram;

    public function __construct(Api $telegram)
    {
        $this->telegram = $telegram;
    }

    public function get_me()
    {
        $response = $this->telegram->getMe();

        return $response;
    }
}
