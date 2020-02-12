<?php

namespace GettextEasyRxCustom\EasyRxCustomGenerators;

use GettextEasyRxCustom\EasyRxCustomTranslations;

interface GeneratorInterface
{
    /**
     * Saves the translations in a file.
     *
     * @param EasyRxCustomTranslations $translations
     * @param string       $file
     * @param array        $options
     *
     * @return bool
     */
    public static function toFile(EasyRxCustomTranslations $translations, $file, array $options = []);

    /**
     * Generates a string with the translations ready to save in a file.
     *
     * @param EasyRxCustomTranslations $translations
     * @param array        $options
     *
     * @return string
     */
    public static function toString(EasyRxCustomTranslations $translations, array $options = []);
}
