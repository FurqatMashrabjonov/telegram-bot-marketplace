<?php

namespace App\Telegram\Addons\ChannelSubscribeChecker\Facades;


use App\Telegram\Addons\ChannelSubscribeChecker\ChannelSubscribe;
use Illuminate\Support\Facades\Facade;

class ChannelSubscribeFacade extends Facade
{

    /**
     * Get the registered name of the component.
     * @see App\Telegram\Addons\ChannelSubscribeChecker\ChannelSubscribe
     * @see ChannelSubscribe::check()
     * @see ChannelSubscribe::class
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return ChannelSubscribe::class;
    }


}
