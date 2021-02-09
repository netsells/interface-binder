<?php

namespace Netsells\InterfaceBinder;

#[\Attribute]
final class BoundTo
{
    public function __construct(public string $concrete)
    {
    }
}
