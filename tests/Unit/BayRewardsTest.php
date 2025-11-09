<?php

use Palpalani\BayRewards\BayRewards;
use Palpalani\BayRewards\Factory;

it('can create a factory instance', function () {
    $factory = BayRewards::factory();

    expect($factory)
        ->toBeInstanceOf(Factory::class);
});

it('can create a client with default api version', function () {
    $factory = BayRewards::client();

    expect($factory)
        ->toBeInstanceOf(Factory::class)
        ->and($factory->apiVersion)
        ->toBe('v1');
});

it('can create a client with custom api version', function () {
    $factory = BayRewards::client('v2');

    expect($factory)
        ->toBeInstanceOf(Factory::class)
        ->and($factory->apiVersion)
        ->toBe('v2');
});

it('returns a new factory instance each time', function () {
    $factory1 = BayRewards::factory();
    $factory2 = BayRewards::factory();

    expect($factory1)
        ->not->toBe($factory2);
});

