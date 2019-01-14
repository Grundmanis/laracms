<?php

namespace Grundmanis\Laracms\Modules\Breadcrumbs\ViewComposers;

use Grundmanis\Laracms\Modules\Breadcrumbs\BreadcrumbGenerator;
use Illuminate\View\View;

class BreadcrumbsComposer
{

    /**
     * @var array
     */
    protected $segments;

    /**
     * @var BreadcrumbGenerator
     */
    private $breadcrumbs;

    /**
     * BreadcrumbsComposer constructor.
     * @param BreadcrumbGenerator $breadcrumbs
     */
    public function __construct(BreadcrumbGenerator $breadcrumbs)
    {
        $this->breadcrumbs = $breadcrumbs;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with([
            'url' => '/',
            'segments' => $this->breadcrumbs->getSegments(),
            'segmentCount' => $this->breadcrumbs->getSegmentCount(),
        ]);
    }
}