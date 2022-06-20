<?php

declare(strict_types=1);

namespace Ircsasw\ApiNemo\Elements\AvailabilityQueryRQ;

use Ircsasw\ApiNemo\Elements\Common\AbstractElement;

final class AvailabilityQueryRQ extends AbstractElement
{
    public function getElementName(): string
    {
        return 'AvailabilityQueryRQ';
    }

    public function getGeneralParameters(): GeneralParameters
    {
        return $this->helperGetOrAdd(new GeneralParameters());
    }

    public function addGeneralParameters(array $attributes = []): GeneralParameters
    {
        $generalParameters = $this->getGeneralParameters();
        $generalParameters->addAttributes($attributes);
        return $generalParameters;
    }

    public function getTrips(): Trips
    {
        return $this->helperGetOrAdd(new Trips());
    }

    public function addTrips(array $attributes = []): Trips
    {
        $trips = $this->getTrips();
        $trips->addAttributes($attributes);
        return $trips;
    }
}
