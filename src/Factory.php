<?php

namespace TargetBay\BayRewards;

use Saloon\Http\Connector;
use TargetBay\BayRewards\Resources\StoreResource;
use TargetBay\BayRewards\Resources\CreateActivityResource;
use TargetBay\BayRewards\Resources\ActivityResource;
use TargetBay\BayRewards\Resources\PointsResource;

final class Factory extends Connector
{
    public string $apiVersion = 'v1';

    /**
     * Resolve the base URL of the service.
     */
    public function resolveBaseUrl(): string
    {
        return "http://app.polar.localhost/api/{$this->apiVersion}";
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
