<?php

namespace GettextEasyRxCustom\EasyRxCustomExtractors;

use BadMethodCallException;
use GettextEasyRxCustom\EasyRxCustomTranslations;
use GettextEasyRxCustom\EasyRxCustomUtils\MultidimensionalArrayTrait;

/**
 * Class to get gettext strings from php files returning arrays.
 */
class PhpArray extends Extractor implements ExtractorInterface
{
    use MultidimensionalArrayTrait;

    /**
     * {@inheritdoc}
     */
    public static function fromFile($file, EasyRxCustomTranslations $translations, array $options = [])
    {
        foreach (static::getFiles($file) as $file) {
            static::fromArray(include($file), $translations);
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function fromString($string, EasyRxCustomTranslations $translations, array $options = [])
    {
        throw new BadMethodCallException('PhpArray::fromString() cannot be called. Use PhpArray::fromFile()');
    }
}
