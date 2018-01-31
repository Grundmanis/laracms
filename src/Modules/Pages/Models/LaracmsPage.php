<?php

namespace Grundmanis\Laracms\Modules\Pages\Models;

use Illuminate\Database\Eloquent\Model;

class LaracmsPage extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['text'];
    protected $fillable = ['url', 'layout'];

    /**
     * LaracmsPage constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return request()->root() . '/' . $this->url;
    }
}
