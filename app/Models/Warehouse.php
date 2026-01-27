<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'address',
        'phone',
        'manager_id',
        'manager_name',
        'capacity',
        'is_active',
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
}
