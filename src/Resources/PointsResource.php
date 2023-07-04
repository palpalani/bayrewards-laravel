<?php

namespace Palpalani\BayRewards\Resources;

use Palpalani\BayRewards\Objects\ActionData;
use Palpalani\BayRewards\Requests\Store\UpdatePointsRequest;

final class PointsResource extends Resource
{
    /**
     * @return mixed|ActionData
     */
    public function post(string $access_token, array $data): mixed
    {
        return $this->connector->send(new UpdatePointsRequest($access_token, $data))->dto();
    }
}
