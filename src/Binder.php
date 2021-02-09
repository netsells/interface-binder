<?php

namespace Netsells\InterfaceBinder;

use Illuminate\Support\Facades\App;
use Netsells\AttributeFinder\AttributeFinder;
use Netsells\InterfaceBinder\Attributes\BoundTo;
use Netsells\InterfaceBinder\Exceptions\InvalidInterfaceBindingException;

class Binder implements BinderInterface
{
    /**
     * @throws InvalidInterfaceBindingException
     */
    public function bindInterfaces(iterable $directories): void
    {
        foreach ($directories as $directory) {
            $this->validateDirectory($directory);
            $this->bindInterfacesForDirectory($directory);
        }
    }

    /**
     * @throws InvalidInterfaceBindingException
     */
    private function bindInterfacesForDirectory(string $directory): void
    {
        $interfaces = app(AttributeFinder::class, [
            'directory' => $directory,
        ])->getClassesWithAttribute(BoundTo::class);

        foreach ($interfaces as $reflector) {
            $concreteName = $reflector->getAttributes()[0]->newInstance()->concrete;
            $interfaceName = $reflector->getName();

            $this->validateBinding($interfaceName, $concreteName);

            App::bind($interfaceName, $concreteName);
        }
    }

    /**
     * @throws InvalidInterfaceBindingException
     */
    private function validateBinding(string $interfaceName, string $concreteName): void
    {
        if (!class_exists($concreteName)) {
            throw new InvalidInterfaceBindingException(
                "Error when attempting to bind {$interfaceName} to {$concreteName}. {$concreteName} does not exist"
            );
        }

        if (!in_array($interfaceName, class_implements($concreteName))) {
            throw new InvalidInterfaceBindingException(
                "Error when attempting to bind {$interfaceName} to {$concreteName}. {$concreteName} does not implement {$interfaceName}"
            );
        }
    }

    /**
     * @throws InvalidInterfaceBindingException
     */
    private function validateDirectory(string $directory): void
    {
        if (!is_dir($directory)) {
            throw new InvalidInterfaceBindingException(
                "Cannot bind interfaces in {$directory} as the directory does not exist"
            );
        }
    }
}
