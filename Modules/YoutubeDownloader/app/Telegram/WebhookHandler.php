<?php

namespace Modules\YoutubeDownloader\app\Telegram;

use App\Telegram\Helpers\TelegramHelper;
use DefStudio\Telegraph\Handlers\EmptyWebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;

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
        $this->chat->html(
            $this->customizeText("Hello World")
        )->keyboard(Keyboard::make()->buttons([
            Button::make('Delete')->action('delete')->param('id', '42'),
            Button::make('open')->url('https://youtube.com'),
            Button::make('Web App')->webApp('https://youtube.com'),
        ]))
            ->send();
    }

    public function delete(): void
    {
        $this->chat->html(
            $this->customizeText("Deleted id: {$this->data['id']}")
        )->send();
    }

}
