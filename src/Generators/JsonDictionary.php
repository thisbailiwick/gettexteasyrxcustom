<?php

namespace GettextEasyRxCustom\EasryRxCustomGenerators;

use GettextEasyRxCustom\EasryRxCustomTranslations;
use GettextEasyRxCustom\EasryRxCustomUtils\DictionaryTrait;

class JsonDictionary extends Generator implements GeneratorInterface
{
    use DictionaryTrait;

    public static $options = [
        'json' => 0,
        'includeHeaders' => false,
    ];

    /**
     * {@parentDoc}.
     */
    public static function toString(EasyRxCustomTranslations $translations, array $options = [])
    {
        $options += static::$options;

        return json_encode(static::toArray($translations, $options['includeHeaders']), $options['json']);
    }
}
