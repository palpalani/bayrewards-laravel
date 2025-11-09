<?php

use Palpalani\BayRewards\Factory;
use Palpalani\BayRewards\Resources\ActivityResource;
use Palpalani\BayRewards\Resources\CreateActivityResource;
use Palpalani\BayRewards\Resources\CustomerResource;
use Palpalani\BayRewards\Resources\PointsResource;
use Palpalani\BayRewards\Resources\StoreFeatureResource;
use Palpalani\BayRewards\Resources\StoreResource;
use Palpalani\BayRewards\Resources\UpdateActivityResource;

beforeEach(function () {
    config()->set('bayrewards-laravel.bayrewards_base_url', 'https://api.example.com');
});

it('can set api version', function () {
    $factory = new Factory();

    $result = $factory->withApiVersion('v2');

    expect($factory->apiVersion)
        ->toBe('v2')
        ->and($result)
        ->toBeInstanceOf(Factory::class)
        ->and($result)
        ->toBe($factory);
});

it('resolves base url correctly', function () {
    $factory = new Factory();
    $factory->apiVersion = 'v1';

    $baseUrl = $factory->resolveBaseUrl();

    expect($baseUrl)
        ->toBe('https://api.example.com/api/v1');
});

it('resolves base url with custom api version', function () {
    $factory = new Factory();
    $factory->apiVersion = 'v2';

    $baseUrl = $factory->resolveBaseUrl();

    expect($baseUrl)
        ->toBe('https://api.example.com/api/v2');
});

it('can create store details resource', function () {
    $factory = new Factory();

    $resource = $factory->storeDetails();

    expect($resource)
        ->toBeInstanceOf(StoreResource::class);
});

it('can create create activity resource', function () {
    $factory = new Factory();

    $resource = $factory->createActivity();

    expect($resource)
        ->toBeInstanceOf(CreateActivityResource::class);
});

it('can create get activity resource', function () {
    $factory = new Factory();

    $resource = $factory->getActivity();

    expect($resource)
        ->toBeInstanceOf(ActivityResource::class);
});

it('can create update activity resource', function () {
    $factory = new Factory();

    $resource = $factory->updateActivity();

    expect($resource)
        ->toBeInstanceOf(UpdateActivityResource::class);
});

it('can create update points resource', function () {
    $factory = new Factory();

    $resource = $factory->updatePoints();

    expect($resource)
        ->toBeInstanceOf(PointsResource::class);
});

it('can create all customers resource', function () {
    $factory = new Factory();

    $resource = $factory->allCustomers();

    expect($resource)
        ->toBeInstanceOf(CustomerResource::class);
});

it('can create get store features resource', function () {
    $factory = new Factory();

    $resource = $factory->getStoreFeatures();

    expect($resource)
        ->toBeInstanceOf(StoreFeatureResource::class);
});

