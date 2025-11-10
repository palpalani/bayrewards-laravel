<?php

namespace Palpalani\BayRewards\Objects;

use Palpalani\BayRewards\Contracts\DataTransferObject;
use Saloon\Contracts\DataObjects\WithResponse;
use Saloon\Traits\Responses\HasResponse;

/**
 * @phpstan-type ActionData array{success: bool|null, code: int|null, locale: string|null, message: string|null, data: array|null}
 *
 * @implements DataTransferObject<ActionData>
 */
final class Action implements DataTransferObject, WithResponse
{
    use HasResponse;

    /**
     * @param  string[]|null  $languages
     * @param  string[]|null  $borders
     * @param  string[]|null  $flags
     */
    public function __construct(
        public readonly ?bool $success,
        public readonly ?int $code,
        public readonly ?string $locale,
        public readonly ?string $message,
        public readonly ?array $data,
    ) {}

    public static function from(array $data): Action
    {
        return new self(...$data);
    }
}
