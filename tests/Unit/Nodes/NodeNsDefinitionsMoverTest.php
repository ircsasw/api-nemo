<?php

namespace Ircsasw\ApiNemo\Tests\Unit\Nodes;

use Ircsasw\ApiNemo\Nodes\NodeNsDefinitionsMover;
use Ircsasw\ApiNemo\Nodes\XmlNodeUtils;
use Ircsasw\ApiNemo\Tests\TestCase;

final class NodeNsDefinitionsMoverTest extends TestCase
{
    public function testMoveDefinitionsWithFilter()
    {
        $inputFile = $this->utilAsset('xml-with-namespace-definitions-at-child-level.xml');
        $input = XmlNodeUtils::nodeFromXmlString(file_get_contents($inputFile) ?: '');

        $processor = new NodeNsDefinitionsMover();
        // only process tempuri namespaces
        $processor->setNamespaceFilter(function (string $namespace): bool {
            return ('http://www.tempuri.org/' === strval(substr($namespace, 0, 23)));
        });
        $processor->process($input);

        $expectedFile = $this->utilAsset('xml-with-namespace-definitions-at-root-level-filtered.xml');
        $this->assertXmlStringEqualsXmlFile($expectedFile, XmlNodeUtils::nodeToXmlString($input));
    }

    public function testMoveDefinitionsWithoutFilter()
    {
        $inputFile = $this->utilAsset('xml-with-namespace-definitions-at-child-level.xml');
        $input = XmlNodeUtils::nodeFromXmlString(file_get_contents($inputFile) ?: '');

        $processor = new NodeNsDefinitionsMover();
        $processor->process($input);

        $expectedFile = $this->utilAsset('xml-with-namespace-definitions-at-root-level-all.xml');
        $this->assertXmlStringEqualsXmlFile($expectedFile, XmlNodeUtils::nodeToXmlString($input));
    }
}
