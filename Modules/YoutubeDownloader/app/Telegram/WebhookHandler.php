<?php

namespace Modules\YoutubeDownloader\app\Telegram;

use App\Telegram\Addons\SendAds\Facades\SendAdsFacade;
use App\Telegram\Helpers\TelegramHelper;
use DefStudio\Telegraph\Handlers\EmptyWebhookHandler;


class WebhookHandler extends EmptyWebhookHandler
{

    use TelegramHelper;


    public function handleChatMessage($text): void
    {
        $this->chat->html(
            $this->customizeText($text)
        )->send();
    }


    public function start(): void
    {
        $chat_ids = array_fill(0, 20, $this->chat->chat_id);

        SendAdsFacade::bot($this->bot)->ids($chat_ids)->text('test')->send();
    }

}
