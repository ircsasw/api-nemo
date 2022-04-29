<?php

declare(strict_types=1);

namespace Ircsasw\ApiNemo\Elements\AvailabilityQueryRQ;

use Ircsasw\ApiNemo\Elements\Common\AbstractElement;

final class Trips extends AbstractElement
{
    public function getElementName(): string
    {
        return 'Trips';
    }

    public function addTrips(array ...$elementAttributes): self
    {
        foreach ($elementAttributes as $attributes) {
            $this->addTrip($attributes);
        }

        return $this;
    }

    public function addTrip(array $attributes): Trip
    {
        $trip = new Trip($attributes);
        $this->addChild($trip);

        return $trip;
    }
}
