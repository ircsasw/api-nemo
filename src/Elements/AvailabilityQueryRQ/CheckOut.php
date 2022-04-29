<?php

declare(strict_types=1);

namespace Ircsasw\ApiNemo\Elements\AvailabilityQueryRQ;

use Ircsasw\ApiNemo\Elements\Common\AbstractElement;

final class CheckOut extends AbstractElement
{
    public function getElementName(): string
    {
        return 'CheckOut';
    }
}