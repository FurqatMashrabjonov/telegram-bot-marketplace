<?php

namespace App\Telegram\Addons\SendAds\Facades;

use App\Telegram\Addons\SendAds\SendAds;
use Illuminate\Support\Facades\Facade;

class SendAdsFacade extends Facade
{
    /*
     *
     * bool static send()
     * self static ids(array $chat_ids)
     * self static text(string $text)
     * self static bot(Bot $bot)
     */
    public static function getFacadeAccessor(): string
    {
        return SendAds::class;
    }

}
