<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'color';

    protected $fillable = [
        'name_en',
        'name_ru',
        'color_code',
    ];
}
