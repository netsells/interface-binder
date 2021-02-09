<?php

namespace Netsells\InterfaceBinder\Tests\TestInterfaces\TestTwo;

use Netsells\InterfaceBinder\Attributes\BoundTo;
use Netsells\InterfaceBinder\Tests\TestInterfaces\TestClassTwo;

#[BoundTo(TestClassTwo::class)]
interface TestInterfaceTwo
{
    public function testMethod(): void;
}
