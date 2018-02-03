<?php

namespace Grundmanis\Laracms\Modules\Dashboard\ViewComposers;

use Grundmanis\Laracms\Modules\Breadcrumbs\BreadcrumbGenerator;
use Grundmanis\Laracms\Modules\Dashboard\LocalesGenerator;
use Illuminate\View\View;

class LocalesComposer
{
    /**
     * @var LocalesGenerator
     */
    private $localesGenerator;

    /**
     * LocalesComposer constructor.
     * @param LocalesGenerator $localesGenerator
     */
    public function __construct(LocalesGenerator $localesGenerator)
    {
        $this->localesGenerator = $localesGenerator;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with(['locales' => $this->localesGenerator->getLocales()]);
    }
}