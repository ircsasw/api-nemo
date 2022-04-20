<?php

namespace Ircsasw\ApiNemo\Elements\Common;

use Ircsasw\ApiNemo\Nodes\NodeInterface;

interface ElementInterface extends NodeInterface
{
    public function getElementName(): string;

    public function getFixedAttributes(): array;

    public function getChildrenOrder(): array;
}
