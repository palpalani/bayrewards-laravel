<?php

namespace Palpalani\BayRewards\Requests\Store;

use Palpalani\BayRewards\Objects\Action;
use Palpalani\BayRewards\Responses\Store\GetActionResponse;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

final class UpdatePointsRequest extends Request implements HasBody
{
    use AlwaysThrowOnErrors;
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(protected string $access_token, protected array $data = [])
    {
    }

    /**
     * {@inheritDoc}
     */
    public function resolveEndpoint(): string
    {
        return '/action/update-points';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Store-Access-Token' => $this->access_token,
        ];
    }

    public function defaultBody(): array
    {
        return $this->data;
    }

    public function createDtoFromResponse(Response $response): Action
    {
        return GetActionResponse::make($response);
    }
}
