<?php

namespace Netsells\InterfaceBinder\Tests\Unit;

use Netsells\InterfaceBinder\BinderInterface;
use Netsells\InterfaceBinder\Exceptions\InvalidInterfaceBindingException;
use Netsells\InterfaceBinder\Tests\TestCase;

class BinderTest extends TestCase
{
    public function testThrowsExceptionForInvalidDirectory(): void
    {
        $directory = "fake/directory";

        $this->expectException(InvalidInterfaceBindingException::class);
        $this->expectExceptionMessage("Cannot bind interfaces in {$directory} as the directory does not exist");

        app(BinderInterface::class)->bindInterfaces([$directory]);
    }
}
