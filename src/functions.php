<?php
/**
 * Created by PhpStorm.
 * User: epsilon
 * Date: 18.27.1
 * Time: 22:56
 */
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
        if (request()->is($url)) {
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