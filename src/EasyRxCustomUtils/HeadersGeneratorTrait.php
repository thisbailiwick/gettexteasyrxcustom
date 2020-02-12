<?php

namespace GettextEasyRxCustom\EasyRxCustomUtils;

use GettextEasyRxCustom\EasyRxCustomTranslations;

/**
 * Trait to provide the functionality of extracting headers.
 */
trait HeadersGeneratorTrait
{
    /**
     * Returns the headers as a string.
     *
     * @param EasyRxCustomTranslations $translations
     *
     * @return string
     */
    protected static function generateHeaders(EasyRxCustomTranslations $translations)
    {
        $headers = '';

        foreach ($translations->getHeaders() as $name => $value) {
            $headers .= sprintf("%s: %s\n", $name, $value);
        }

        return $headers;
    }
}
