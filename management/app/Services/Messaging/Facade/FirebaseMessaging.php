<?php

namespace App\Services\Messaging\Facade;

use Illuminate\Support\Facades\Facade;

class FirebaseMessaging extends Facade
{
    /**
     * Replace the bound instance with a fake.
     *
     * @return \App\Services\Messaging\FirebaseMessagingFake
     */
    public static function fake()
    {
        static::swap($fake = new \App\Services\Messaging\FirebaseMessagingFake('-'));

        return $fake;
    }

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \App\Services\Messaging\FirebaseMessaging::class;
    }
}
