<?php

namespace GettextEasyRxCustom\EasyRxCustomUtils;

use GettextEasyRxCustom\EasyRxCustomTranslations;

/**
 * Trait used by all generators that exports the translations to plain dictionary (original => singular-translation).
 */
trait DictionaryTrait
{
    use HeadersGeneratorTrait;
    use HeadersExtractorTrait;

    /**
     * Returns a plain dictionary with the format [original => translation].
     *
     * @param EasyRxCustomTranslations $translations
     * @param bool         $includeHeaders
     *
     * @return array
     */
    protected static function toArray(EasyRxCustomTranslations $translations, $includeHeaders)
    {
        $messages = [];

        if ($includeHeaders) {
            $messages[''] = static::generateHeaders($translations);
        }

        foreach ($translations as $translation) {
            if ($translation->isDisabled()) {
                continue;
            }

            $messages[$translation->getOriginal()] = $translation->getTranslation();
        }

        return $messages;
    }

    /**
     * Extract the entries from a dictionary.
     *
     * @param array        $messages
     * @param EasyRxCustomTranslations $translations
     */
    protected static function fromArray(array $messages, EasyRxCustomTranslations $translations)
    {
        foreach ($messages as $original => $translation) {
            if ($original === '') {
                static::extractHeaders($translation, $translations);
                continue;
            }

            $translations->insert(null, $original)->setTranslation($translation);
        }
    }
}
