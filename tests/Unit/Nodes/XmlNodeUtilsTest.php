<?php

namespace Ircsasw\ApiNemo\Tests\Unit\Nodes;

use Ircsasw\ApiNemo\Nodes\Node;
use Ircsasw\ApiNemo\Nodes\XmlNodeUtils;
use Ircsasw\ApiNemo\Utils\Xml;
use Ircsasw\ApiNemo\Tests\TestCase;

final class XmlNodeUtilsTest extends TestCase
{
    public function testNodeToXmlStringXmlHeader()
    {
        $node = new Node('book', [], [
            new Node('chapter', ['toc' => '1']),
            new Node('chapter', ['toc' => '2']),
        ]);

        $xmlString = XmlNodeUtils::nodeToXmlString($node, true);
        $this->assertStringStartsWith('<?xml version="1.0" encoding="UTF-8"?>', $xmlString);

        $xmlString = XmlNodeUtils::nodeToXmlString($node, false);
        $this->assertStringStartsWith('<book>', $xmlString);
    }

    public function testImportXmlWithNamespaceWithoutPrefix()
    {
        $file = $this->utilAsset('xml-with-namespace-definitions-at-child-level.xml');
        $node = XmlNodeUtils::nodeFromXmlString(file_get_contents($file) ?: '');
        $inspected = $node->searchNode('base:Third', 'innerNS');
        if (null === $inspected) {
            $this->fail('The specimen does not have the required test case');
        }
        $this->assertSame('http://external.com/inner', $inspected['xmlns']);
    }
}
