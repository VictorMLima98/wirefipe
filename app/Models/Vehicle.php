<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany, HasManyThrough};

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'manufacturer_id',
        'external_id',
        'name',
    ];

    public function manufacturer(): BelongsTo
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function year(): HasMany
    {
        return $this->hasMany(VehicleYear::class);
    }

    public function prices(): HasManyThrough
    {
        return $this->hasManyThrough(VehiclePrice::class, VehicleYear::class);
    }
}
