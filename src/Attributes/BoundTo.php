<?php

namespace Netsells\InterfaceBinder\Attributes;

#[\Attribute]
final class BoundTo
{
    public function __construct(public string $concrete)
    {
    }
}
