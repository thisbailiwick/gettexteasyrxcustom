<?php

namespace GettextEasyRxCustom\EasryRxCustomExtractors;

use GettextEasyRxCustom\EasryRxCustomTranslations;
use GettextEasyRxCustom\EasryRxCustomUtils\HeadersExtractorTrait;
use GettextEasyRxCustom\EasryRxCustomUtils\CsvTrait;

/**
 * Class to get gettext strings from csv.
 */
class Csv extends Extractor implements ExtractorInterface
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
            $context = array_shift($row);
            $original = array_shift($row);

            if ($context === '' && $original === '') {
                static::extractHeaders(array_shift($row), $translations);
                continue;
            }

            $translation = $translations->insert($context, $original);

            if (!empty($row)) {
                $translation->setTranslation(array_shift($row));
                $translation->setPluralTranslations($row);
            }
        }

        fclose($handle);
    }
}
