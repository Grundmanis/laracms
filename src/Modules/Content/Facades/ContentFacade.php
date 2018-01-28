<?php

namespace Grundmanis\Laracms\Modules\Content\Facades;

use Illuminate\Support\Facades\Facade;

class ContentFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Content';
    }
}