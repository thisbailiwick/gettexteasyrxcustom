<?php

namespace GettextEasyRxCustom\EasyRxCustomExtractors;

use GettextEasyRxCustom\EasyRxCustomTranslations;

interface ExtractorInterface
{
    /**
     * Extract the translations from a file.
     *
     * @param array|string $file         A path of a file or files
     * @param EasyRxCustomTranslations $translations The translations instance to append the new translations.
     * @param array        $options
     */
    public static function fromFile($file, EasyRxCustomTranslations $translations, array $options = []);

    /**
     * Parses a string and append the translations found in the Translations instance.
     *
     * @param string       $string
     * @param EasyRxCustomTranslations $translations
     * @param array        $options
     */
    public static function fromString($string, EasyRxCustomTranslations $translations, array $options = []);
}
