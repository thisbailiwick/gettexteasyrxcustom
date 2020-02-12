<?php

namespace GettextEasyRxCustom\EasryRxCustomExtractors;

use GettextEasyRxCustom\EasryRxCustomTranslations;
use GettextEasyRxCustom\EasryRxCustomUtils\MultidimensionalArrayTrait;

/**
 * Class to get gettext strings from json.
 */
class Json extends Extractor implements ExtractorInterface
{
    use MultidimensionalArrayTrait;

    /**
     * {@inheritdoc}
     */
    public static function fromString($string, EasyRxCustomTranslations $translations, array $options = [])
    {
        $messages = json_decode($string, true);

        if (is_array($messages)) {
            static::fromArray($messages, $translations);
        }
    }
}
