<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('telegram_log', function (Blueprint $table) {
            $table->id();
            $table->string('update_id');
            $table->string('message_id');
            $table->string('chat_id');
            $table->string('chat_type');
            $table->string('chat_title')->nullable();
            $table->string('chat_username')->nullable();
            $table->string('chat_first_name')->nullable();
            $table->string('chat_last_name')->nullable();
            $table->string('from_id')->nullable();
            $table->string('from_first_name')->nullable();
            $table->string('from_last_name')->nullable();
            $table->string('from_username')->nullable();
            $table->string('from_language_code')->nullable();
            $table->string('date');
            $table->string('text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telegram_log');
    }
};
