<?php

namespace App\Telegram\Addons\ChannelSubscribeChecker;

use App\Telegram\Addons\Interfaces\MainInterface;
use DefStudio\Telegraph\Facades\Telegraph;
use function Pest\Laravel\json;

class ChannelSubscribe implements MainInterface
{
    public function check(string $chat_id, array $channel_id): void
    {
        $response  = Telegraph::chatMember($chat_id)->send();
        \Log::debug(json_encode($response));
    }

}
