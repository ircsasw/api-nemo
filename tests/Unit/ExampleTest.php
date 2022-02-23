<?php

declare(strict_types=1);

namespace Ircsasw\ApiNemo\Tests\Unit;

use Ircsasw\ApiNemo\Example;
use Ircsasw\ApiNemo\Tests\TestCase;

class ExampleTest extends TestCase
{
    public function testSomething(): void
    {
        $example = new Example();
        $int = $example->generate();
        $this->assertGreaterThan(0, $int);
    }
}
