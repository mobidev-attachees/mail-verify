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
        Schema::create('validations', function (Blueprint $table) {

            $table->id();
            $table->string('email')->unique();
            $table->boolean('format');
            $table->boolean('catchall');
            $table->boolean('domain');
            $table->boolean('noblock');
            $table->boolean('nogeneric');
            $table->string('status')->nullable();
            $table->integer('results')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('validations');
    }
};
