<?php

namespace Grundmanis\Laracms\Modules\Dashboard\Facades;

use Illuminate\Support\Facades\Facade;

class LocaleFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Locale';
    }
}