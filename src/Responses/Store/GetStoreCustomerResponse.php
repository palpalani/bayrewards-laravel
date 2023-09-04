<?php

namespace Palpalani\BayRewards\Responses\Store;

use Palpalani\BayRewards\Objects\Store;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type StoreData from Store
 */
final class GetStoreCustomerResponse
{
    public static function make(Response $response): Store
    {
        /** @var StoreData $data */
        $data = $response->json();

        return new Store(...$data);
    }
}
