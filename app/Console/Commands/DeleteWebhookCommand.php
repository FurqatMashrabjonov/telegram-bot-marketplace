<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class DeleteWebhookCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:webhook';

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
        $this->info('Deleting webhook...');

        $test_token = config('telegraph.test_token');

        $res = Http::get(config('telegraph.telegram_api_url') . "/bot{$test_token}/deleteWebhook");
        if ($res->ok()) {
            $this->info('Webhook deleted!');
        }else{
            $this->error('Webhook not deleted!');
        }
    }
}
