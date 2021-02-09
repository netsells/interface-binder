<?php

namespace Netsells\InterfaceBinder\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Netsells\InterfaceBinder\InterfaceBinderServiceProvider;
use Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables;

abstract class TestCase extends BaseTestCase
{
    /**
     * @return void
     */
    public function setup(): void
    {
        parent::setup();

        $this->app->config->set(
            "interface-binder.directories",
            [
                __DIR__ . '/TestInterfaces',
            ]
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            InterfaceBinderServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // make sure, our .env file is loaded
        $app->useEnvironmentPath(__DIR__ . '/..');
        $app->bootstrapWith([LoadEnvironmentVariables::class]);
        parent::getEnvironmentSetUp($app);
    }
}