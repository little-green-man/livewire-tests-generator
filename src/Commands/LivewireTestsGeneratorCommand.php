<?php

namespace LittleGreenMan\LivewireTestsGenerator\Commands;

use Illuminate\Console\Command;
use LittleGreenMan\LivewireTestsGenerator\Facades\LivewireTestsGenerator;

class LivewireTestsGeneratorCommand extends Command
{
    public $signature = 'generate-livewire-tests {for : }';

    public $description = 'Scaffold unit tests for your Livewire components';

    public function handle(): int
    {
        $manifestCount = LivewireTestsGenerator::generateTestFiles();

        $this->comment('All done');

        return self::SUCCESS;
    }
}
