<?php

it('has bayrewards base url config', function () {
    $config = config('bayrewards-laravel');

    expect($config)
        ->toBeArray()
        ->toHaveKey('bayrewards_base_url');
});

it('can read bayrewards base url from env', function () {
    $baseUrl = 'https://api.bayrewards.io';

    config()->set('bayrewards-laravel.bayrewards_base_url', $baseUrl);

    expect(config('bayrewards-laravel.bayrewards_base_url'))
        ->toBe($baseUrl);
});

it('defaults bayrewards base url to null when not set', function () {
    config()->set('bayrewards-laravel.bayrewards_base_url', null);

    expect(config('bayrewards-laravel.bayrewards_base_url'))
        ->toBeNull();
});
