<?php

namespace Grundmanis\Laracms\Modules\Pages;

class LayoutsLoader {

    /**
     * @var array
     */
    protected $layouts = [];

    /**
     * Load layouts
     */
    public function load()
    {
        $layoutsFolder = resource_path('views/laracms/pages/layouts');
        foreach (array_diff(scandir($layoutsFolder), ['.', '..']) as $layout) {
            $name = str_replace('.blade.php', '', $layout);
            $this->layouts[] = $name;
        }
        return $this->layouts;
    }
}