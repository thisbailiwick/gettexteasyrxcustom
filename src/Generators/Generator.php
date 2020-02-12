<?php

namespace GettextEasyRxCustom\EasryRxCustomGenerators;

use GettextEasyRxCustom\EasryRxCustomTranslations;

abstract class Generator implements GeneratorInterface
{
    /**
     * {@inheritdoc}
     */
    public static function toFile(EasyRxCustomTranslations $translations, $file, array $options = [])
    {
        $content = static::toString($translations, $options);

        if (file_put_contents($file, $content) === false) {
            return false;
        }

        return true;
    }
}
