<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'manager_name',
        'capacity',
        'is_active',
        'location_id',
        'warehouse_manager_id',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'capacity' => 'integer',
    ];

    /**
     * Get the warehouse workers for the warehouse.
     */

    /**
     * Get the manager of the warehouse.
     */
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_warehouse')->withPivot(['income', 'stocks']);
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'location_id');
    }
}
