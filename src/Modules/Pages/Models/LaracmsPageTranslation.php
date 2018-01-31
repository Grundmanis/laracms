<?php

namespace Grundmanis\Laracms\Modules\Pages\Models;

use Illuminate\Database\Eloquent\Model;

class LaracmsPageTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['text'];
}
