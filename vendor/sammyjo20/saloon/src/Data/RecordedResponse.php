<?php

declare(strict_types=1);

namespace Saloon\Data;

use JsonSerializable;
use Saloon\Contracts\Response;
use Saloon\Http\Faking\MockResponse;

class RecordedResponse implements JsonSerializable
{
    /**
     * Constructor
     *
     * @param int $statusCode
     * @param array<string, mixed> $headers
     * @param mixed $data
     */
    public function __construct(
        public int   $statusCode,
        public array $headers = [],
        public mixed $data = null,
    ) {
        //
    }

    /**
     * Create an instance from file contents
     *
     * @param string $contents
     * @return static
     * @throws \JsonException
     */
    public static function fromFile(string $contents): static
    {
        /**
         * @param array{
         *     statusCode: int,
         *     headers: array<string, mixed>,
         *     data: mixed,
         * } $fileData
         */
        $fileData = json_decode($contents, true, 512, JSON_THROW_ON_ERROR);

        $data = $fileData['data'];

        if (isset($fileData['encoding']) && $fileData['encoding'] === 'base64') {
            $data = base64_decode($data);
        }

        return new static(
            statusCode: $fileData['statusCode'],
            headers: $fileData['headers'],
            data: $data
        );
    }

    /**
     * Create an instance from a Response
     *
     * @param \Saloon\Contracts\Response $response
     * @return static
     */
    public static function fromResponse(Response $response): static
    {
        return new static(
            statusCode: $response->status(),
            headers: $response->headers()->all(),
            data: $response->body(),
        );
    }

    /**
     * Encode the instance to be stored as a file
     *
     * @return string
     * @throws \JsonException
     */
    public function toFile(): string
    {
        return json_encode($this, JSON_THROW_ON_ERROR);
    }

    /**
     * Create a mock response from the fixture
     *
     * @return \Saloon\Http\Faking\MockResponse
     */
    public function toMockResponse(): MockResponse
    {
        return new MockResponse($this->data, $this->statusCode, $this->headers);
    }

    /**
     * Define the JSON object if this class is converted into JSON
     *
     * @return array{
     *     statusCode: int,
     *     headers: array<string, mixed>,
     *     data: mixed,
     * }
     */
    public function jsonSerialize(): array
    {
        $response = [
            'statusCode' => $this->statusCode,
            'headers' => $this->headers,
            'data' => $this->data,
        ];

        if (mb_check_encoding($response['data'], 'UTF-8') === false) {
            $response['data'] = base64_encode($response['data']);
            $response['encoding'] = 'base64';
        }

        return $response;
    }
}
