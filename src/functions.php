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
        if (is_array($url)) {
            foreach ($url as $route) {
                if (request()->routeIs($route['url'] . '*')) {
                    return true;
                }
            }
        }
        else if (request()->routeIs($url)) {
            return true;
        }

        return false;
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