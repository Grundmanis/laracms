<?php

namespace Grundmanis\Laracms\Modules\Content\Models;

use Illuminate\Database\Eloquent\Model;

class LaracmsContent extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['value'];
    protected $fillable = ['slug'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
