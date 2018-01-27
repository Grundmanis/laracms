<?php

namespace Grundweb\Laracms\Modules\Content;

use Grundweb\Laracms\Modules\Content\Models\LaracmsContent;

class Content
{
    /**
     * @var static
     */
    protected $contents;

    /**
     * Content constructor.
     * @param LaracmsContent $content
     */
    public function __construct(LaracmsContent $content)
    {
        $this->contents = $content->all()->keyBy('slug');
    }

    /**
     * @param string $slug
     * @param null $locale
     * @return mixed
     */
    public function get(string $slug, $locale = null)
    {
        if ($locale) {
            return $this->contents[$slug]->translate($locale)->value;
        }
        return $this->contents[$slug]->value;
    }


}