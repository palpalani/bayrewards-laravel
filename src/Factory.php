<?php

namespace Palpalani\BayRewards;

use Palpalani\BayRewards\Resources\ActivityResource;
use Palpalani\BayRewards\Resources\CreateActivityResource;
use Palpalani\BayRewards\Resources\PointsResource;
use Palpalani\BayRewards\Resources\StoreResource;
use Saloon\Http\Connector;

final class Factory extends Connector
{
    public string $apiVersion = 'v1';

    /**
     * Resolve the base URL of the service.
     */
    public function resolveBaseUrl(): string
    {
        return "https://data.bayrewards.io/api/{$this->apiVersion}";
    }

    public function withApiVersion(string $apiVersion): self
    {
        $this->apiVersion = $apiVersion;

        return $this;
    }

    public function storeDetails(): StoreResource
    {
        return new StoreResource($this);
    }

    public function createActivity(): CreateActivityResource
    {
        return new CreateActivityResource($this);
    }

    public function getActivity(): ActivityResource
    {
        return new ActivityResource($this);
    }

    public function updatePoints(): PointsResource
    {
        return new PointsResource($this);
    }
}
