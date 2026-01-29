<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class country extends Model
{
    protected $fillable = [
        'name',
        'code',
        'longitude',
        'latitude',
    ];

    /**
     * Get the cities for the country.
     */
    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }
}
