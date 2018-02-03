<?php

namespace Grundmanis\Laracms\Modules\Breadcrumbs;

use Illuminate\Support\Facades\Request;

class BreadcrumbGenerator
{
    /**
     * @var array
     */
    private $segments;

    /**
     * Breadcrumbs constructor.
     */
    public function __construct()
    {
        $this->segments = Request::segments();
        $this->unsetLastElement();
    }

    /**
     * Unset
     */
    protected function unsetLastElement()
    {
        if (is_numeric(end($this->segments)))
        {
            unset($this->segments[$this->getSegmentCount()]);
        }
    }

    /**
     * @return int
     */
    public function getSegmentCount()
    {
        return count($this->segments) - 1;
    }

    /**
     * @return array
     */
    public function getSegments()
    {
        return $this->segments;
    }

}