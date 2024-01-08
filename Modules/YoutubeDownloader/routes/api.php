<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\YoutubeDownloader\app\Http\Controllers\Telegram\WebhookHandlerController;

/*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | is assigned the "api" middleware group. Enjoy building your API!
    |
*/

//Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
//    Route::get('youtubedownloader', fn (Request $request) => $request->user())->name('youtubedownloader');
//});
//

Route::prefix('youtube-downloader/telegram')
    ->as('youtube-downloader.telegram.')
    ->controller(WebhookHandlerController::class)
    ->group(function (){
       Route::post('/{token}/webhook', 'handler')->name('webhook');
    });
