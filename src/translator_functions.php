<?php

use GettextEasyRxCustom\EasyRxCustomBaseTranslator;

/**
 * Returns the translation of a string.
 *
 * @param string $original
 *
 * @return string
 */
function ___($original)
{
    $text = EasyRxCustomBaseTranslator::$current->gettext($original);

    if (func_num_args() === 1) {
        return $text;
    }

    $args = array_slice(func_get_args(), 1);

    return is_array($args[0]) ? strtr($text, $args[0]) : vsprintf($text, $args);
}

function __($original)
{
  $text = EasyRxCustomBaseTranslator::$current->gettext($original);

  if (func_num_args() === 1) {
    return $text;
  }

  $args = array_slice(func_get_args(), 1);

  return is_array($args[0]) ? strtr($text, $args[0]) : vsprintf($text, $args);
}


/**
 * Noop, marks the string for translation but returns it unchanged.
 *
 * @param string $original
 *
 * @return string
 */
function noop___($original)
{
    return $original;
}

/**
 * Returns the singular/plural translation of a string.
 *
 * @param string $original
 * @param string $plural
 * @param string $value
 *
 * @return string
 */
function n___($original, $plural, $value)
{
    $text = EasyRxCustomBaseTranslator::$current->ngettext($original, $plural, $value);

    if (func_num_args() === 3) {
        return $text;
    }

    $args = array_slice(func_get_args(), 3);

    return is_array($args[0]) ? strtr($text, $args[0]) : vsprintf($text, $args);
}

/**
 * Returns the translation of a string in a specific context.
 *
 * @param string $context
 * @param string $original
 *
 * @return string
 */
function p___($context, $original)
{
    $text = EasyRxCustomBaseTranslator::$current->pgettext($context, $original);

    if (func_num_args() === 2) {
        return $text;
    }

    $args = array_slice(func_get_args(), 2);

    return is_array($args[0]) ? strtr($text, $args[0]) : vsprintf($text, $args);
}

/**
 * Returns the translation of a string in a specific domain.
 *
 * @param string $domain
 * @param string $original
 *
 * @return string
 */
function d___($domain, $original)
{
    $text = EasyRxCustomBaseTranslator::$current->dgettext($domain, $original);

    if (func_num_args() === 2) {
        return $text;
    }

    $args = array_slice(func_get_args(), 2);

    return is_array($args[0]) ? strtr($text, $args[0]) : vsprintf($text, $args);
}

/**
 * Returns the translation of a string in a specific domain and context.
 *
 * @param string $domain
 * @param string $context
 * @param string $original
 *
 * @return string
 */
function dp___($domain, $context, $original)
{
    $text = EasyRxCustomBaseTranslator::$current->dpgettext($domain, $context, $original);

    if (func_num_args() === 3) {
        return $text;
    }

    $args = array_slice(func_get_args(), 3);

    return is_array($args[0]) ? strtr($text, $args[0]) : vsprintf($text, $args);
}

/**
 * Returns the singular/plural translation of a string in a specific domain.
 *
 * @param string $domain
 * @param string $original
 * @param string $plural
 * @param string $value
 *
 * @return string
 */
function dn___($domain, $original, $plural, $value)
{
    $text = EasyRxCustomBaseTranslator::$current->dngettext($domain, $original, $plural, $value);

    if (func_num_args() === 4) {
        return $text;
    }

    $args = array_slice(func_get_args(), 4);

    return is_array($args[0]) ? strtr($text, $args[0]) : vsprintf($text, $args);
}

/**
 * Returns the singular/plural translation of a string in a specific context.
 *
 * @param string $context
 * @param string $original
 * @param string $plural
 * @param string $value
 *
 * @return string
 */
function np___($context, $original, $plural, $value)
{
    $text = EasyRxCustomBaseTranslator::$current->npgettext($context, $original, $plural, $value);

    if (func_num_args() === 4) {
        return $text;
    }

    $args = array_slice(func_get_args(), 4);

    return is_array($args[0]) ? strtr($text, $args[0]) : vsprintf($text, $args);
}

/**
 * Returns the singular/plural translation of a string in a specific domain and context.
 *
 * @param string $domain
 * @param string $context
 * @param string $original
 * @param string $plural
 * @param string $value
 *
 * @return string
 */
function dnp___($domain, $context, $original, $plural, $value)
{
    $text = EasyRxCustomBaseTranslator::$current->dnpgettext($domain, $context, $original, $plural, $value);

    if (func_num_args() === 5) {
        return $text;
    }

    $args = array_slice(func_get_args(), 5);

    return is_array($args[0]) ? strtr($text, $args[0]) : vsprintf($text, $args);
}
