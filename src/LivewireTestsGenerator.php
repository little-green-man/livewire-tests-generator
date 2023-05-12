<?php

namespace LittleGreenMan\LivewireTestsGenerator;

use Illuminate\Support\Str;
use Livewire\LivewireComponentsFinder;
use ReflectionClass;
use ReflectionMethod;
use ReflectionProperty;
use Touhidurabir\StubGenerator\Facades\StubGenerator;

class LivewireTestsGenerator
{
    public static function generateTestFiles(?string $for = null, bool $force = false): int
    {
        $manifest = $for ? [$for] : app(LivewireComponentsFinder::class)->getManifest();

        $testOutputDirectory = Str::of(config('LivewireTestsGenerator::output-directory'))->finish('/');

        foreach ($manifest as $livewireClass) {
            $testFilename = $testOutputDirectory.Str::of($livewireClass)
                ->after('App\\Http\\Livewire\\')
                ->replace('\\', '/')
                ->append('Test.php');

            if ($force || ! file_exists($testFilename)) {
                mkdir(Str::of($testFilename)->beforeLast('/'), recursive: true);
                file_put_contents($testFilename, self::getTestFileContentFor($livewireClass));
            }
        }

        return count($manifest);
    }

        public static function getTestFileContentFor(string $livewireClassname)
        {
            $methodsContent = '';

            $class = new ReflectionClass($livewireClassname);

            $attributes = self::getComponentAttributes($class);

            $ownPublicMethods = collect($class->getMethods(ReflectionMethod::IS_PUBLIC))
                ->filter(fn ($method) => $method->getFileName() == $class->getFileName());

            if ($ownPublicMethods->count()) {
                $ownPublicMethods->each(function ($method) use ($methodsContent, $class, $attributes) {
                    $methodsContent .= StubGenerator::from(__DIR__.'../resources/stubs/test-function.php.stub')
                        ->withReplacers([
                            'method_name' => $method->name,
                            'class_name' => $class->name,
                            'attributes' => $attributes,
                        ])
                        ->toString();
                });
            } else {
                $methodsContent .= StubGenerator::from(__DIR__.'../resources/stubs/test-attributes.php.stub')
                    ->withReplacers([
                        'class_name' => $class->name,
                        'attributes' => $attributes,
                    ])
                    ->toString();
            }

            return StubGenerator::from(__DIR__.'../resources/stubs/Test.php.stub')
                ->withReplacers([
                    'livewireClassname' => $livewireClassname,
                    'methods' => $methodsContent,
                ])
                ->toString();
        }

        public static function getComponentAttributes(ReflectionClass $class)
        {
            return collect($class->getProperties(ReflectionProperty::IS_PUBLIC))
                ->filter(fn ($attribute) => $attribute->class == $class->name)
                ->map(fn ($attribute) => "        ->set('{$attribute->name}', '{$attribute->getType()}')".PHP_EOL)
                ->join('');
        }
}
