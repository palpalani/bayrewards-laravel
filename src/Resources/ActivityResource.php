<?php

namespace Palpalani\BayRewards\Resources;

use Palpalani\BayRewards\Objects\Action;
use Palpalani\BayRewards\Requests\Store\GetActivityRequest;

final class ActivityResource extends Resource
{
    /**
     * @return mixed|Action
     */
    public function get(string $access_token, string $activity_id): mixed
    {
        return $this->connector->send(new GetActivityRequest($access_token, $activity_id))->dto();
    }
}
