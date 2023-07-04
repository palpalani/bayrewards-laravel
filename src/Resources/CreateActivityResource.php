<?php

namespace Palpalani\BayRewards\Resources;

use Palpalani\BayRewards\Objects\CreateActivity;
use Palpalani\BayRewards\Requests\Store\CreateActivityRequest;

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
