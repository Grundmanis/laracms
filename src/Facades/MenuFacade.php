<?php

namespace Grundmanis\Laracms\Facades;

use Grundmanis\Laracms\LaracmsMenu;
use Illuminate\Support\Facades\Facade;

class MenuFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return LaracmsMenu::class;
    }
}