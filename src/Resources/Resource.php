<?php

namespace Palpalani\BayRewards\Resources;

use Saloon\Http\Connector;

abstract class Resource
{
    public function __construct(protected Connector $connector)
    {
        //
    }
}
