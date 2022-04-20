<?php

namespace Ircsasw\ApiNemo;

use Ircsasw\ApiNemo\Elements\AvailabilityQueryRQ\AvailabilityQueryRQ;

class QueryCreator
{
    use QueryCreatorTrait;

    /** @var AvailabilityQueryRQ */
    private $availabilityQueryRQ;

    /**
     * @inheritdoc
     */
    public function __construct()
    {
        $this->availabilityQueryRQ = new AvailabilityQueryRQ();
    }

    public function availabilityQueryRQ(): AvailabilityQueryRQ
    {
        return $this->availabilityQueryRQ;
    }
}
