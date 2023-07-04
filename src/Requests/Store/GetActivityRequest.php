<?php

namespace Palpalani\BayRewards\Requests\Store;

use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;
use Palpalani\BayRewards\Objects\Action;
use Palpalani\BayRewards\Responses\Store\GetActionResponse;

final class GetActivityRequest extends Request
{
    use AlwaysThrowOnErrors;

    protected Method $method = Method::GET;

    public function __construct(protected string $access_token, protected string $activity_id)
    {

    }

    /**
     * {@inheritDoc}
     */
    public function resolveEndpoint(): string
    {
        return "/action/{$this->activity_id}";
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Store-Access-Token' => $this->access_token,
        ];
    }

    public function createDtoFromResponse(Response $response): Action
    {
        return GetActionResponse::make($response);
    }
}
