<?php

use Palpalani\BayRewards\Facades\BayRewards;
use Palpalani\BayRewards\Factory;

it('can access bayrewards through facade', function () {
    $factory = BayRewards::factory();

    expect($factory)
        ->toBeInstanceOf(Factory::class);
});

it('can access client through facade', function () {
    $factory = BayRewards::client();

    expect($factory)
        ->toBeInstanceOf(Factory::class);
});

it('can access client with custom api version through facade', function () {
    $factory = BayRewards::client('v2');

    expect($factory)
        ->toBeInstanceOf(Factory::class)
        ->and($factory->apiVersion)
        ->toBe('v2');
});
