<?php

namespace TargetBay\BayRewards\Resources;

use TargetBay\BayRewards\Objects\CreateActivity;
use TargetBay\BayRewards\Requests\Store\CreateActivityRequest;

final class CreateActivityResource extends Resource
{
    /**
     * @return mixed|CreateActivity
     */
    public function post(string $access_token, array $data): mixed
    {
        return $this->connector->send(new CreateActivityRequest($access_token, $data))->dto();
    }
}
