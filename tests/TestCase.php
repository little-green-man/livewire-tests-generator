<?php

namespace LittleGreenMan\LivewireTestsGenerator\Tests;

use LittleGreenMan\LivewireTestsGenerator\LivewireTestsGeneratorServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            LivewireTestsGeneratorServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_livewire-tests-generator_table.php.stub';
        $migration->up();
        */
    }
}
