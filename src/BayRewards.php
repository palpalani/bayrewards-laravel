<?php

namespace Palpalani\BayRewards;

use TargetBay\BayRewards\Factory;

class BayRewards
{
    public static function client(string $apiVersion = 'v1'): Factory
    {
        return self::factory()->withApiVersion($apiVersion);
    }

    public static function factory(): Factory
    {
        return new Factory();
    }
}
