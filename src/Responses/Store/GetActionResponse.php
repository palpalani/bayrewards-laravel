<?php

namespace TargetBay\BayRewards\Responses\Store;

use Saloon\Contracts\Response;
use TargetBay\BayRewards\Objects\Action;

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
