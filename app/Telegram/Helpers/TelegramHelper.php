<?php

namespace App\Telegram\Helpers;

use Illuminate\Support\Str;

trait TelegramHelper
{

    public function customizeText(string $text):string {
        $time = Str::limit(microtime(true) - LARAVEL_START, 5) . "s";
        return $text . "<blockquote>$time</blockquote>";
    }

}
