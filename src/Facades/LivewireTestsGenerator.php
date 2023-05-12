<?php

namespace LittleGreenMan\LivewireTestsGenerator\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \LittleGreenMan\LivewireTestsGenerator\LivewireTestsGenerator
 */
class LivewireTestsGenerator extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \LittleGreenMan\LivewireTestsGenerator\LivewireTestsGenerator::class;
    }
}
