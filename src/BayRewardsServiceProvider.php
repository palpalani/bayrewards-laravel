<?php

namespace Palpalani\BayRewards;

use Palpalani\BayRewards\Commands\BayRewardsCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class BayRewardsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a BayRewards Service Provider
         */
        $package
            ->name('bayrewards-laravel')
            ->hasConfigFile();
        // ->hasViews()
        // ->hasMigration('create_bayrewards-laravel_table')
        // ->hasCommand(BayRewardsCommand::class);
    }
}
