<?php

namespace Palpalani\BayRewards\Resources;

use Saloon\Contracts\Connector;

abstract class Resource
{
    public function __construct(protected Connector $connector)
    {
        //
    }
}
