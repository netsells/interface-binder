<?php

namespace Netsells\InterfaceBinder;

use App\Attributes\BoundTo;
use App\Features\InterfaceBinder\Binder;
use App\Exceptions\InterfaceBinder\InvalidInterfaceBindingException;

#[BoundTo(Binder::class)]
interface BinderInterface
{
    /**
     * @throws InvalidInterfaceBindingException
     */
    public function bindInterfaces(iterable $directories): void;
}
