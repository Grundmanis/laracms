<?php

namespace Grundmanis\Laracms;

class LaracmsMenu {

    /**
     * @var array
     */
    public $routes = [];

    /**
     * @param $newRoutes
     */
    public function addMenu($newRoutes)
    {
        $this->routes = $this->routes + $newRoutes;
    }

    /**
     * @return array
     */
    public function getMenu()
    {
        return array_sort($this->routes);
    }
}