<?php

namespace TargetBay\BayRewards\Resources;

use TargetBay\BayRewards\Objects\Store;
use TargetBay\BayRewards\Requests\Store\GetStoreRequest;

final class StoreResource extends Resource
{
    /**
     * @return mixed|Store
     */
    public function get(string $access_token): mixed
    {
        return $this->connector->send(new GetStoreRequest($access_token))->dto();
    }
}
