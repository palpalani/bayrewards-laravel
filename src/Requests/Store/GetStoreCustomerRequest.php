<?php

namespace Palpalani\BayRewards\Requests\Store;

use Palpalani\BayRewards\Objects\Store;
use Palpalani\BayRewards\Responses\Store\GetStoreCustomerResponse;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

final class GetStoreCustomerRequest extends Request
{
    use AlwaysThrowOnErrors;

    protected Method $method = Method::GET;

    public function __construct(protected string $access_token,protected int $page,protected int $limit,protected int $type,protected string $sortBy,protected string $search)
    {

    }

    /**
     * {@inheritDoc}
     */
    public function resolveEndpoint(): string
    {
        return "/customer?page={$this->page}&limit=$this->limit&type={$this->type}&sort_by={$this->sortBy}&search={$this->search}";
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
        return GetStoreCustomerResponse::make($response);
    }
}
