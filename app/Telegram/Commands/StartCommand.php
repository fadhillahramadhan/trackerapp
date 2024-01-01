<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram\Bot\Laravel\Facades\Telegram;

class StartCommand extends Command
{
    protected string $name = 'start';
    protected string $description = 'Start Command to get you started';

    public function handle()
    {
        // specifity chat id
        $chat_id = $this
            ->getUpdate()
            ->getMessage()
            ->getChat()
            ->getId();

        $keyboard = [
            ['Start'],
            ['About']
        ];

        $reply_markup = Keyboard::make([
            'keyboard' => $keyboard,
            'resize_keyboard' => true,
            'one_time_keyboard' => true
        ]);

        $response = Telegram::sendMessage([
            'chat_id' => $chat_id,
            'text' => 'Welcome to my bot',
            'reply_markup' => $reply_markup
        ]);

        $response->getMessageId();

        echo $reply_markup;
    }
}
