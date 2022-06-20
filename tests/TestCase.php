<?php

declare(strict_types=1);

namespace Ircsasw\ApiNemo\Tests;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    public static function filePath(string $append = ''): string
    {
        return __DIR__ . '/_files/' . $append;
    }

    public static function fileContents(string $path = ''): string
    {
        return @file_get_contents($path) ?: '';
    }

    public static function utilAsset(string $file): string
    {
        return __DIR__ . '/assets/' . $file;
    }
}
