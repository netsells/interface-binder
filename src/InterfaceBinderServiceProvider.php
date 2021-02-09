<?php

namespace Netsells\InterfaceBinder;

use Illuminate\Support\ServiceProvider;

class InterfaceBinderServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/Config/interface-binder.php' => config_path('interface-binder.php'),
        ], 'interface-binder');
    }

    public function register()
    {
        $this->app->bind(BinderInterface::class, Binder::class);

        app(BinderInterface::class)->bindInterfaces(config('interface-binder.directories', []));
    }
}
