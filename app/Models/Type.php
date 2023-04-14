<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{HasMany, HasManyThrough};
use Illuminate\Database\Eloquent\{Builder, Model};

class Type extends Model
{
    use HasFactory;

    public function manufacturers(): HasMany
    {
        return $this->hasMany(Manufacturer::class);
    }

    public function scopeCars(Builder $query): Builder
    {
        return $query->where('name', 'carros');
    }
}
