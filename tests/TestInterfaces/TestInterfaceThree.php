<?php

namespace Netsells\InterfaceBinder\Tests\TestInterfaces;

use Netsells\InterfaceBinder\Attributes\BoundTo;
use Netsells\InterfaceBinder\Tests\TestInterfaces\TestThree\TestClassThree;

#[BoundTo(TestClassThree::class)]
interface TestInterfaceThree
{
    public function testMethod(): void;
}
