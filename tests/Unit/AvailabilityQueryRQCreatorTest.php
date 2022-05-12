<?php

declare(strict_types=1);

namespace Ircsasw\ApiNemo\Tests\Unit;

use Ircsasw\ApiNemo\AvailabilityQueryRQCreator;
use Ircsasw\ApiNemo\Elements\AvailabilityQueryRQ\GeneralParameters;
use Ircsasw\ApiNemo\Tests\TestCase;

class AvailabilityQueryRQCreatorTest extends TestCase
{
    protected function getXmlBody(): string
    {
        return '<?xml version="1.0" encoding="UTF-8"?><AvailabilityQueryRQ TransactionId="9c8ac0a3_3e12_4fc5_ad86_6a774def52b6" TransactionMode="Synchronous">  <GeneralParameters> </GeneralParameters></AvailabilityQueryRQ>';
    }

    public function testGenerateXml(): void
    {
        $creator = new AvailabilityQueryRQCreator();
        $availabilityQueryRQ = $creator->availabilityQueryRQ();
        $availabilityQueryRQ->addAttributes([
            'TransactionId' => '9c8ac0a3_3e12_4fc5_ad86_6a774def52b6',
            'TransactionMode' => 'Synchronous'
        ]);

        $generalParameters = new GeneralParameters();
        $generalParameters->addValue(' ');
        $availabilityQueryRQ->addChild($generalParameters);

        $generatedXml = trim(str_replace(["\n", "\r"], '', $creator->asXml()));

        $this->assertSame(trim($this->getXmlBody()), $generatedXml);
    }
}
