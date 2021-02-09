<?php

namespace Netsells\InterfaceBinder\Tests\Feature;

use Netsells\InterfaceBinder\Tests\TestCase;
use Netsells\InterfaceBinder\Tests\TestInterfaces\TestClassTwo;
use Netsells\InterfaceBinder\Tests\TestInterfaces\TestInterfaceThree;
use Netsells\InterfaceBinder\Tests\TestInterfaces\TestOne\TestClassOne;
use Netsells\InterfaceBinder\Tests\TestInterfaces\TestOne\TestInterfaceOne;
use Netsells\InterfaceBinder\Tests\TestInterfaces\TestThree\TestClassThree;
use Netsells\InterfaceBinder\Tests\TestInterfaces\TestTwo\TestInterfaceTwo;

class FilterFactoryTest extends TestCase
{
    public function testBindsInterfacesInSameDirectoryAsClass(): void
    {
        $class = app(TestInterfaceOne::class);
        $this->assertEquals(TestClassOne::class, $class::class);
    }

    public function testBindsToClassInParentDirectory()
    {
        $class = app(TestInterfaceTwo::class);
        $this->assertEquals(TestClassTwo::class, $class::class);
    }

    public function testBindsToClassInSubDirectory()
    {
        $class = app(TestInterfaceThree::class);
        $this->assertEquals(TestClassThree::class, $class::class);
    }
}
