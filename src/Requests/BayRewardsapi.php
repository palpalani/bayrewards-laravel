<?php

declare(strict_types=1);

namespace BayRewardsapi;

use BayRewardsapi\Responses\BayRewardsapiResponse;
use Generator;
use Saloon\Contracts\Request;
use Saloon\Http\Connector;

class BayRewardsapi extends Connector
{
    /**
     * Define the custom response
     */
    protected string $response = BayRewardsapiResponse::class;

    /**
     * Resolve the base URL of the service.
     */
    public function resolveBaseUrl(): string
    {
        return 'http://app.polar.localhost/api/v1';
    }

    /**
     * Define default headers
     *
     * @return string[]
     */
    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];
    }

    /**
     * Iterate over a paginated request
     *
     * @throws \ReflectionException
     * @throws \Saloon\Exceptions\InvalidResponseClassException
     * @throws \Saloon\Exceptions\PendingRequestException
     */
    public function paginator(Request $request, bool $asResponse = false): Generator
    {
        $page = 1;

        do {
            $request->query()->merge([
                'offset' => ($page - 1) * 100,
                'limit' => 100,
            ]);

            $response = $this->send($request);

            $asResponse ? yield $response : yield from $response->json('results');

            $page++;
        } while ($response->json('next') !== null);
    }
}
