<?php

namespace Palpalani\BayRewards\Resources;

use Palpalani\BayRewards\Objects\ActionData;
use Palpalani\BayRewards\Requests\Store\GetStoreFeaturesRequest;

final class StoreFeatureResource extends Resource
{
    /**
     * @return mixed|ActionData
     */
    public function post(string $access_token, array $data): mixed
    {
        return $this->connector->send(new GetStoreFeaturesRequest($access_token, $data))->dto();
    }
}
