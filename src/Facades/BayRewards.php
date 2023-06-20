<?php

namespace Palpalani\BayRewards\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Palpalani\BayRewards\BayRewards
 */
class BayRewards extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Palpalani\BayRewards\BayRewards::class;
    }
}
