<?php

use Palpalani\BayRewards\Factory;

test('factory is final', function () {
    expect(Factory::class)
        ->toBeFinal();
});

test('factory extends saloon connector', function () {
    expect(Factory::class)
        ->toExtend(\Saloon\Http\Connector::class);
});
