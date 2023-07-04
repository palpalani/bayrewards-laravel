<?php

namespace Palpalani\BayRewards\Resources;

use Palpalani\BayRewards\Objects\Store;
use Palpalani\BayRewards\Requests\Store\GetStoreRequest;

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
