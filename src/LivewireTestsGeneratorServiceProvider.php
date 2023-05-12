<?php

namespace LittleGreenMan\LivewireTestsGenerator;

use LittleGreenMan\LivewireTestsGenerator\Commands\LivewireTestsGeneratorCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LivewireTestsGeneratorServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('livewire-tests-generator')
            ->hasConfigFile()
            ->hasCommand(LivewireTestsGeneratorCommand::class);
    }
}
