<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'logo',
    ];

    /**
     * The products that belong to the brand.
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'brand_product');
    }
}
