<?php

if (! function_exists('formValue'))
{
    function formValue($variable, $name, $locale = null)
    {
        if ($locale) {
            return isset($variable) ? $variable->translate($locale)[$name] : old($locale . '.' . $name);
        }
        return isset($variable) ? $variable[$name] : old($name);
    }
}

if (! function_exists('activeRoute'))
{
    function activeRoute($url)
    {
        if (request()->routeIs($url)) {
            return 'active';
        }

        return '';
    }
}

if (! function_exists('content'))
{
    function content($slug, $locale = null)
    {
        return Content::get($slug, $locale);
    }
}