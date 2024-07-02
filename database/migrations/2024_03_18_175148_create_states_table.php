<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('parent_code')->nullable();
            $table->string('name')->nullable();
            $table->string('name_np')->nullable();
            $table->string('code')->nullable();
            $table->string('type')->nullable();
            $table->string('area')->nullable();
            $table->string('centroid')->nullable();
            $table->string('geom')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('states');
    }
};
