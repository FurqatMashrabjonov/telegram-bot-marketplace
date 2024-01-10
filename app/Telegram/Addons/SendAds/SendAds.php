<?php

namespace App\Telegram\Addons\SendAds;

use App\Jobs\Telegram\Addons\SendAdsJob;
use App\Models\Bot;

class SendAds
{

    protected Bot $bot;
    protected array $chat_ids;
    protected string $text;

    public function send(): bool
    {
        collect($this->chat_ids)
            ->chunk(3)
            ->each(function ($chunk) {
                dispatch(new SendAdsJob($this->bot, $chunk->toArray(), $this->text));
            });
        return true;
    }

    public function bot(Bot $bot): self
    {
        $this->bot = $bot;

        return $this;
    }

    public function ids(array $chat_ids): self
    {
        $this->chat_ids = $chat_ids;

        return $this;
    }

    public function text(string $text): self
    {
        $this->text = $text;

        return $this;
    }

}
