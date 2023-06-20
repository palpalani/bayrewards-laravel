<?php

namespace Palpalani\BayRewards;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Palpalani\BayRewards\Commands\BayRewardsCommand;

class BayRewardsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('bayrewards-laravel')
            ->hasConfigFile()/
            // ->hasViews()
            // ->hasMigration('create_bayrewards-laravel_table')
            // ->hasCommand(BayRewardsCommand::class);
    }
}
