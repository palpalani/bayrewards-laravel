<?php

use Palpalani\BayRewards\BayRewardsServiceProvider;

it('registers the service provider', function () {
    $providers = app()->getLoadedProviders();

    expect($providers)
        ->toHaveKey(BayRewardsServiceProvider::class);
});

it('publishes config file', function () {
    $this->artisan('vendor:publish', [
        '--provider' => BayRewardsServiceProvider::class,
        '--tag' => 'bayrewards-laravel-config',
    ])->assertSuccessful();

    expect(config_path('bayrewards-laravel.php'))
        ->toBeFile();
});

it('loads config file correctly', function () {
    $config = config('bayrewards-laravel');

    expect($config)
        ->toBeArray()
        ->toHaveKey('bayrewards_base_url');
});
