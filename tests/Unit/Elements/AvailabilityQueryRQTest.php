<?php

namespace Ircsasw\ApiNemo\Tests\Unit\Elements;

use Ircsasw\ApiNemo\Elements\AvailabilityQueryRQ\AvailabilityQueryRQ;
use Ircsasw\ApiNemo\Elements\AvailabilityQueryRQ\GeneralParameters;
use Ircsasw\ApiNemo\Elements\AvailabilityQueryRQ\Trips;
use Ircsasw\ApiNemo\Tests\TestCase;

final class AvailabilityQueryRQTest extends TestCase
{
    /** @var AvailabilityQueryRQ */
    public $element;

    protected function setUp(): void
    {
        parent::setUp();
        $this->element = new AvailabilityQueryRQ();
    }

    public function testGetElementName()
    {
        $availabilityQueryRq = new AvailabilityQueryRQ();

        $this->assertSame('AvailabilityQueryRQ', $availabilityQueryRq->getElementName());
    }

    public function testGetGeneralParameters()
    {
        $this->assertCount(0, $this->element->searchNodes('GeneralParameters'));

        $first = $this->element->getGeneralParameters();
        $this->assertCount(1, $this->element->searchNodes('GeneralParameters'));

        $second = $this->element->getGeneralParameters();
        $this->assertCount(1, $this->element->searchNodes('GeneralParameters'));

        $this->assertSame($first, $second);
    }

    public function testAddGeneralParameters()
    {
        $first = $this->element->addGeneralParameters(['id' => 'first']);
        $this->assertInstanceOf(GeneralParameters::class, $first);
        $this->assertSame('first', $first['id']);
        $this->assertCount(1, $this->element);
    }

    public function testGetTrips()
    {
        $this->assertCount(0, $this->element->searchNodes('Trips'));

        $first = $this->element->getTrips();
        $this->assertCount(1, $this->element->searchNodes('Trips'));

        $second = $this->element->getTrips();
        $this->assertCount(1, $this->element->searchNodes('Trips'));

        $this->assertSame($first, $second);
    }

    public function testAddTrips()
    {
        $first = $this->element->addTrips(['id' => 'first']);
        $this->assertInstanceOf(Trips::class, $first);
        $this->assertSame('first', $first['id']);
        $this->assertCount(1, $this->element);
    }
}
