<?php

use App\Models\Vehicle;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('vehicle_years', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Vehicle::class);
            $table->string('external_id');
            $table->string('code')->unique();
            $table->string('year');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicle_years');
    }
};
