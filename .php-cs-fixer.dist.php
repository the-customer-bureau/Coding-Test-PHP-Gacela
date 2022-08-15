<?php

$header = <<<EOF
@project TCB Coding Test
@link https://github.com/the-customer-bureau/Coding-Test-PHP-Gacela
@project engineered/coding_test_php_gacela
@author The Customer Bureau
@license GPL-3.0
@copyright 2022 The Customer Bureau

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
EOF;

return (new PhpCsFixer\Config())
    ->setCacheFile('.tcb/var/php-cs-fixer.cache')
    ->setRiskyAllowed(true)
    ->setRules([
        '@PhpCsFixer' => true,
        'declare_strict_types' => true,
        'header_comment' => ['header' => $header, 'comment_type' => 'PHPDoc'],
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in(__DIR__ . '/src')
            ->in(__DIR__ . '/tests')
            ->exclude(__DIR__.'/var')
    );
