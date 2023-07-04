<?php

namespace TargetBay\BayRewards\Requests\Store;

use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;
use TargetBay\BayRewards\Objects\Store;
use TargetBay\BayRewards\Responses\Store\GetStoreResponse;

final class GetStoreRequest extends Request
{
    use AlwaysThrowOnErrors;

    protected Method $method = Method::GET;

    public function __construct(protected string $access_token)
    {

    }

    /**
     * {@inheritDoc}
     */
    public function resolveEndpoint(): string
    {
        return '/account';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Store-Access-Token' => $this->access_token,
        ];
    }

    public function createDtoFromResponse(Response $response): Store
    {
        return GetStoreResponse::make($response);
    }
}
