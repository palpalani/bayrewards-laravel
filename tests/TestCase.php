<?php

namespace Palpalani\BayRewards\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Palpalani\BayRewards\BayRewardsServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Palpalani\\BayRewards\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app): array
    {
        return [
            BayRewardsServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_bayrewards-laravel_table.php.stub';
        $migration->up();
        */
    }

    protected function defineEnvironment($app): void
    {
        $app['config']->set('app.env', 'testing');
    }

    protected function resolveApplicationCore($app): void
    {
        parent::resolveApplicationCore($app);

        $app->detectEnvironment(fn () => 'testing');
    }

    protected function resolveApplicationExceptionHandler($app): void
    {
        // Skip exception handler registration in tests to avoid PHPUnit error handler issues
    }
}
