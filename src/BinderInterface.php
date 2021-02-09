<?php

namespace Netsells\InterfaceBinder;

#[BoundTo(Binder::class)]
interface BinderInterface
{
    /**
     * @throws InvalidInterfaceBindingException
     */
    public function bindInterfaces(iterable $directories): void;
}
