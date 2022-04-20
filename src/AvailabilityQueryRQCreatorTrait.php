<?php

namespace Ircsasw\ApiNemo;

use Ircsasw\ApiNemo\Nodes\XmlNodeUtils;

trait QueryCreatorTrait
{
    public function asXml(): string
    {
        return XmlNodeUtils::nodeToXmlString($this->availabilityQueryRQ, true);
    }

    public function saveXml(string $filename): bool
    {
        return (false !== file_put_contents($filename, $this->asXml()));
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        try {
            return $this->asXml();
        } catch (\Throwable $ex) {
            return '';
        }
    }
}
