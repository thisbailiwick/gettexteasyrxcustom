<?php

namespace GettextEasyRxCustom\EasyRxCustomGenerators;

use GettextEasyRxCustom\EasyRxCustomTranslations;
use GettextEasyRxCustom\EasyRxCustomUtils\MultidimensionalArrayTrait;

class PhpArray extends Generator implements GeneratorInterface
{
    use MultidimensionalArrayTrait;

    public static $options = [
        'includeHeaders' => true,
    ];

    /**
     * {@inheritdoc}
     */
    public static function toString(EasyRxCustomTranslations $translations, array $options = [])
    {
        $array = static::generate($translations, $options);

        return '<?php return '.var_export($array, true).';';
    }

    /**
     * Generates an array with the translations.
     *
     * @param EasyRxCustomTranslations $translations
     * @param array        $options
     *
     * @return array
     */
    public static function generate(EasyRxCustomTranslations $translations, array $options = [])
    {
        $options += static::$options;

        return static::toArray($translations, $options['includeHeaders'], true);
    }
}
