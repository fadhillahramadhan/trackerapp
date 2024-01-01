<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelegramLog extends Model
{
    use HasFactory;

    protected $table = 'telegram_log';

    protected $fillable = [
        'update_id',
        'message_id',
        'chat_id',
        'chat_type',
        'chat_title',
        'chat_username',
        'chat_first_name',
        'chat_last_name',
        'from_id',
        'from_first_name',
        'from_last_name',
        'from_username',
        'from_language_code',
        'date',
        'text',
    ];
}
