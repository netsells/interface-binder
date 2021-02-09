<?php

namespace Netsells\InterfaceBinder\Tests\TestInterfaces\TestOne;

use Netsells\InterfaceBinder\Attributes\BoundTo;

#[BoundTo(TestClassOne::class)]
interface TestInterfaceOne
{
    public function testMethod(): void;
}
