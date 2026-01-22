<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_category_id',
        'name',
        'slug',
        'description',
    ];

    /**
     * Get the main category that owns the category.
     */
    public function mainCategory(): BelongsTo
    {
        return $this->belongsTo(MainCategory::class);
    }

    /**
     * Get the sub categories for the category.
     */
    public function subCategories(): HasMany
    {
        return $this->hasMany(SubCategory::class);
    }
}
