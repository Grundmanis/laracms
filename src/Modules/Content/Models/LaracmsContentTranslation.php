<?php

namespace Grundmanis\Laracms\Modules\Content\Models;

use Illuminate\Database\Eloquent\Model;

class LaracmsContentTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['value'];
}
