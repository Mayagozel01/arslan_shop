<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Country;

class City extends Model
{
    protected $fillable = [
        'name',
        'longitude',
        'latitude',
        'country_id',
    ];
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function warehouses()
    {
        return $this->hasMany(Warehouse::class);
    }
}
