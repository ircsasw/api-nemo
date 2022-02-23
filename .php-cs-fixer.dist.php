<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude('build', 'vendor', 'tools');
;

return (new PhpCsFixer\Config())
    ->setCacheFile(__DIR__ . '/build/php_cs.cache')
    ->setRules([
        '@PSR12' => true,
        //'strict_param' => true,
        //'array_syntax' => ['syntax' => 'short'],
    ])
    ->setFinder($finder)
;
