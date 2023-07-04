<?php

namespace TargetBay\BayRewards\Responses\Store;

use TargetBay\BayRewards\Objects\Action;
use Saloon\Contracts\Response;

/**
 * @phpstan-import-type ActionData from Store
 */
final class GetActionResponse
{
    public static function make(Response $response): Action
    {
        /** @var ActionData $data */
        $data = $response->json();
        
        return new Action(...$data);
    }
}
