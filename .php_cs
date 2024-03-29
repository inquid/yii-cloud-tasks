<?php

declare(strict_types=1);

/**
 * Copyright (c) 2017-2021 Inquid
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/inquid/php-library-template
 */

use Ergebnis\License;
use Ergebnis\PhpCsFixer;

$license = License\Type\MIT::markdown(
    __DIR__ . '/LICENSE.md',
    License\Range::since(
        License\Year::fromString('2017'),
        new \DateTimeZone('UTC')
    ),
    License\Holder::fromString('Inquid'),
    License\Url::fromString('https://github.com/inquid/yii-cloud-tasks')
);

$license->save();

$config = PhpCsFixer\Config\Factory::fromRuleSet(new PhpCsFixer\Config\RuleSet\Php73($license->header()));

$config->getFinder()
    ->exclude([
        '.build/',
        '.github/',
        '.notes/',
    ])
    ->ignoreDotFiles(false)
    ->in(__DIR__)
    ->name('.php_cs');

$config->setCacheFile(__DIR__ . '/.build/php-cs-fixer/.php_cs.cache');

return $config;
