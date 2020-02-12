<?php

namespace GettextEasyRxCustom\EasryRxCustomExtractors;

use GettextEasyRxCustom\EasryRxCustomTranslations;
use GettextEasyRxCustom\EasryRxCustomUtils\HeadersExtractorTrait;
use GettextEasyRxCustom\EasryRxCustomUtils\CsvTrait;

/**
 * Class to get gettext strings from csv.
 */
class CsvDictionary extends Extractor implements ExtractorInterface
{
    use HeadersExtractorTrait;
    use CsvTrait;

    public static $options = [
        'delimiter' => ",",
        'enclosure' => '"',
        'escape_char' => "\\"
    ];

    /**
     * {@inheritdoc}
     */
    public static function fromString($string, EasyRxCustomTranslations $translations, array $options = [])
    {
        $options += static::$options;
        $handle = fopen('php://memory', 'w');

        fputs($handle, $string);
        rewind($handle);

        while ($row = static::fgetcsv($handle, $options)) {
            list($original, $translation) = $row + ['', ''];

            if ($original === '') {
                static::extractHeaders($translation, $translations);
                continue;
            }

            $translations->insert(null, $original)->setTranslation($translation);
        }

        fclose($handle);
    }
}
