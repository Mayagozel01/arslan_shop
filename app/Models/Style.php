<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Style extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * The products that belong to the style.
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_style');
    }
}
