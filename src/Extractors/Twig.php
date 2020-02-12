<?php

namespace GettextEasyRxCustom\EasryRxCustomExtractors;

use GettextEasyRxCustom\EasryRxCustomTranslations;
use Twig_Loader_Array;
use Twig_Environment;
use Twig_Source;
use Twig_Extensions_Extension_I18n;

/**
 * Class to get gettext strings from twig files returning arrays.
 */
class Twig extends Extractor implements ExtractorInterface
{
    public static $options = [
        'extractComments' => 'notes:',
        'twig' => null,
    ];

    /**
     * {@inheritdoc}
     */
    public static function fromString($string, EasyRxCustomTranslations $translations, array $options = [])
    {
        $options += static::$options;

        $twig = $options['twig'] ?: static::createTwig();

        PhpCode::fromString($twig->compileSource(new Twig_Source($string, '')), $translations, $options);
    }

    /**
     * Returns a Twig instance.
     *
     * @return Twig_Environment
     */
    protected static function createTwig()
    {
        $twig = new Twig_Environment(new Twig_Loader_Array(['' => '']));
        $twig->addExtension(new Twig_Extensions_Extension_I18n());

        return static::$options['twig'] = $twig;
    }
}
