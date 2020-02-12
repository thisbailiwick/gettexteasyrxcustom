<?php

namespace GettextEasyRxCustom\EasryRxCustomExtractors;

use GettextEasyRxCustom\EasryRxCustomTranslations;
use GettextEasyRxCustom\EasryRxCustomUtils\DictionaryTrait;
use Symfony\Component\Yaml\Yaml as YamlParser;

/**
 * Class to get gettext strings from yaml.
 */
class YamlDictionary extends Extractor implements ExtractorInterface
{
    use DictionaryTrait;

    /**
     * {@inheritdoc}
     */
    public static function fromString($string, EasyRxCustomTranslations $translations, array $options = [])
    {
        $messages = YamlParser::parse($string);

        if (is_array($messages)) {
            static::fromArray($messages, $translations);
        }
    }
}
