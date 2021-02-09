<?php

namespace Netsells\InterfaceBinder;

use Netsells\InterfaceBinder\Attributes\BoundTo;
use Netsells\InterfaceBinder\Exceptions\InvalidInterfaceBindingException;

interface BinderInterface
{
    /**
     * @throws InvalidInterfaceBindingException
     */
    public function bindInterfaces(iterable $directories): void;
}
