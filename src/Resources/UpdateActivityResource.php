<?php

namespace Palpalani\BayRewards\Resources;

use Palpalani\BayRewards\Objects\UpdateActivity;
use Palpalani\BayRewards\Requests\Store\UpdateActivityRequest;

final class UpdateActivityResource extends Resource
{
    /**
     * @return mixed|UpdateActivity
     */
    public function post(string $access_token, array $data): mixed
    {
        return $this->connector->send(new UpdateActivityRequest($access_token, $data))->dto();
    }
}
