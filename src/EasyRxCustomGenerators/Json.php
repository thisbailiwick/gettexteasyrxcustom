<?php

namespace GettextEasyRxCustom\EasyRxCustomGenerators;

use GettextEasyRxCustom\EasyRxCustomTranslations;
use GettextEasyRxCustom\EasyRxCustomUtils\MultidimensionalArrayTrait;

class Json extends Generator implements GeneratorInterface
{
    use MultidimensionalArrayTrait;

    public static $options = [
        'json' => 0,
        'includeHeaders' => false,
    ];

    /**
     * {@inheritdoc}
     */
    public static function toString(EasyRxCustomTranslations $translations, array $options = [])
    {
        $options += static::$options;

        return json_encode(static::toArray($translations, $options['includeHeaders'], true), $options['json']);
    }
}
