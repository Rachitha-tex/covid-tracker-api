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
        Schema::create('covids', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('pcr_count');
            $table->integer('local_deaths');
            $table->integer('local_active_cases');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('covids');
    }
};
