<?php

namespace TargetBay\BayRewards\Responses\Store;

use Saloon\Contracts\Response;
use TargetBay\BayRewards\Objects\Store;

/**
 * @phpstan-import-type StoreData from Store
 */
final class GetStoreResponse
{
    public static function make(Response $response): Store
    {
        /** @var StoreData $data */
        $data = $response->json();

        return new Store(...$data);
    }
}
