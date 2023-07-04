<?php

namespace TargetBay\BayRewards\Responses\Store;

use TargetBay\BayRewards\Objects\Store;
use Saloon\Contracts\Response;

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
