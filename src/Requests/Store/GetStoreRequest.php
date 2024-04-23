<?php

namespace Palpalani\BayRewards\Requests\Store;

use Palpalani\BayRewards\Objects\Store;
use Palpalani\BayRewards\Responses\Store\GetStoreResponse;
use Saloon\Http\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

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
