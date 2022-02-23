<?php

declare(strict_types=1);

namespace Ircsasw\ApiNemo;

class Example
{
    public function generate(): int
    {
        return mt_rand(1, 10);
    }
}
