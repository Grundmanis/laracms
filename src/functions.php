<?php

/**
 * Get the translated value in LaraCMS multi language fields
 */
if (!function_exists('formValue')) {
    function formValue($variable, $name, $locale = null)
    {
        if ($locale) {
            return isset($variable) ? $variable->translate($locale)[$name] : old($locale . '.' . $name);
        }
        return isset($variable) ? $variable[$name] : old($name);
    }
}

/**
 * Get the active route in LaraCMS
 */
if (!function_exists('activeRoute')) {
    function activeRoute($url)
    {
        if (request()->routeIs($url)) {
            return 'active';
        }

        return '';
    }
}

/**
 * Helper to get the translated content
 */
if (!function_exists('content')) {
    function content($slug, $locale = null)
    {
        return Content::get($slug, $locale);
    }
}