<?php

namespace App\Telegram\Addons\ChannelSubscribeChecker;

use App\Models\Chat;
use App\Telegram\Addons\Interfaces\MainInterface;
use DefStudio\Telegraph\Facades\Telegraph;

class ChannelSubscribe implements MainInterface
{
    public function check(string $chat_id, array $channels): array
    {
        $res = [
            'full_subscribe' => true,
            'channels' => [],
        ];
        foreach ($channels as $channel){
            $response  = Telegraph::chat($channel)->chatMember($chat_id)->send();
            if (!$response->ok())
                $res['full_subscribe'] = false;

            $res['channels'][$channel->chat_id] = $response->telegraphOk();
        }

        return $res;

    }
}
