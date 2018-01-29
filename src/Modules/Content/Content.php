<?php

namespace Grundmanis\Laracms\Modules\Content;

use Grundmanis\Laracms\Modules\Content\Models\LaracmsContent;

class Content
{
    /**
     * @var LaracmsContent
     */
    protected $content;

    /**
     * Content constructor.
     * @param LaracmsContent $content
     */
    public function __construct(LaracmsContent $content)
    {
        $this->content = $content;
    }

    /**
     * @param string $slug
     * @param null $locale
     * @return string
     */
    public function get(string $slug, $locale = null)
    {
        $content = $this->content->where('slug', $slug)->first();

        if (!$content) {
            return 'Content does not exist.';
        }

        if ($locale) {
            return $content->translate($locale)->value;
        }

        return $content->value;
    }


}