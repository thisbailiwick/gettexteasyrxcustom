<?php

namespace GettextEasyRxCustom\EasyRxCustomGenerators;

use GettextEasyRxCustom\EasyRxCustomTranslations;

class Jed extends Generator implements GeneratorInterface
{
    public static $options = [
        'json' => 0,
    ];

    /**
     * {@parentDoc}.
     */
    public static function toString(EasyRxCustomTranslations $translations, array $options = [])
    {
        $domain = $translations->getDomain() ?: 'messages';
        $options += static::$options;

        return json_encode([
            $domain => [
                '' => [
                    'domain' => $domain,
                    'lang' => $translations->getLanguage() ?: 'en',
                    'plural-forms' => $translations->getHeader('Plural-Forms') ?: 'nplurals=2; plural=(n != 1);',
                ],
            ] + static::buildMessages($translations),
        ], $options['json']);
    }

    /**
     * Generates an array with all translations.
     *
     * @param EasyRxCustomTranslations $translations
     *
     * @return array
     */
    protected static function buildMessages(EasyRxCustomTranslations $translations)
    {
        $pluralForm = $translations->getPluralForms();
        $pluralSize = is_array($pluralForm) ? ($pluralForm[0] - 1) : null;
        $messages = [];
        $context_glue = '\u0004';

        foreach ($translations as $translation) {
            if ($translation->isDisabled()) {
                continue;
            }

            $key = ($translation->hasContext() ? $translation->getContext().$context_glue : '')
                .$translation->getOriginal();

            if ($translation->hasPluralTranslations(true)) {
                $message = $translation->getPluralTranslations($pluralSize);
                array_unshift($message, $translation->getTranslation());
            } else {
                $message = [$translation->getTranslation()];
            }

            $messages[$key] = $message;
        }

        return $messages;
    }
}
