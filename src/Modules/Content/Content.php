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
     * @return string
     */
    public function get(string $slug, $locale = null)
    {
        if (empty($this->contents[$slug])) {
            return 'Content does not exist.';
        }

        $content = $this->contents[$slug];

        if ($locale) {
            return $content->translate($locale)->value;
        }

        return $content->value;
    }


}