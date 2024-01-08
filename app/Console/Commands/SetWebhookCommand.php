<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetWebhookCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'set:webhook';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $url = config('app.public_url') . route('youtube-downloader.telegram.webhook', ['token' => config('telegraph.test_token')], false);

        $test_token = config('telegraph.test_token');

        $response = \Http::get(config('telegraph.telegram_api_url') . "bot$test_token/setWebhook", [
            'url' => $url,
        ]);

        if ($response->ok()) {
            $this->info("Webhook set to $url");
        }else{
            $this->error("Error setting webhook: " . $response->json('description'));
        }
    }
}
