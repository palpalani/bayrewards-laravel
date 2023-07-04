<?php

namespace TargetBay\BayRewards\Resources;

use TargetBay\BayRewards\Objects\ActionData;
use TargetBay\BayRewards\Requests\Store\UpdatePointsRequest;

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
