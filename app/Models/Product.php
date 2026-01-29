<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'discount_price',
        'sku',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    /**
     * Get the sub category that owns the product.
     */
    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class, 'category_id');
    }

    /**
     * The brands that belong to the product.
     */
    public function brands(): BelongsToMany
    {
        return $this->belongsToMany(Brand::class, 'brand_product');
    }

    /**
     * The styles that belong to the product.
     */
    public function styles(): BelongsToMany
    {
        return $this->belongsToMany(Style::class, 'product_style');
    }

    /**
     * The sizes that belong to the product.
     */
    public function sizes(): BelongsToMany
    {
        return $this->belongsToMany(Size::class, 'product_size');
    }

    /**
     * The colors that belong to the product.
     */
    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(Color::class, 'color_product');
    }

    /**
     * Get the cart items for the product.
     */
    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    /**
     * Get the order items for the product.
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
    public function warehouses(): BelongsToMany
    {
        return $this->belongsToMany(Warehouse::class, 'product_warehouse')->withPivot(['income', 'stocks']);
    }
}
