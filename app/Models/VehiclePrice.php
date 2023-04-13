<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VehiclePrice extends Model
{
    use HasFactory;

    public function year(): BelongsTo
    {
        return $this->belongsTo(VehicleYear::class);
    }
}
