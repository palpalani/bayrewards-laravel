<?php

use Palpalani\BayRewards\Factory;
use Saloon\Http\Connector;

test('factory is final', function () {
    expect(Factory::class)
        ->toBeFinal();
});

test('factory extends saloon connector', function () {
    expect(Factory::class)
        ->toExtend(Connector::class);
});
