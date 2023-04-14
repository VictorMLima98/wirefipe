<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::table('manufacturers', fn (Blueprint $table) => $table->boolean('featured')->default(false));
    }

    public function down(): void
    {
        Schema::table('manufacturers', fn (Blueprint $table) => $table->dropColumn('featured'));
    }
};