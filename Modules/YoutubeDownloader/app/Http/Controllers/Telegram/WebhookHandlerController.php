<?php

namespace Modules\YoutubeDownloader\app\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use Modules\YoutubeDownloader\app\Telegram\WebhookHandler;
use DefStudio\Telegraph\Models\TelegraphBot;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WebhookHandlerController extends Controller
{

    private string $handler = WebhookHandler::class;

    public function handler(Request $request, string $token): Response|RedirectResponse
    {
        /** @var class-string<TelegraphBot> $botModel */
        $botModel = config('telegraph.models.bot');

        /** @var TelegraphBot $bot */
        $bot = $botModel::fromToken($token);

        /** @var class-string $handler */
        $handler = config('telegraph.webhook_handler');

        /** @var WebhookHandler $handler */
        $handler = app($this->handler);

        $handler->handle($request, $bot);

        return \response()->noContent();
    }
}
