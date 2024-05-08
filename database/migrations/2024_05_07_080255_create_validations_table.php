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
            //add table field for valid_format, is_deliverable , no_catch_all , valid_domain, is generic , is_spam
            // other field could include status , results and email
            //this is the most likely outlook
            //{
            //    "collectionName": "emails",
            //    "email": "koskeyhoward@gmail.com",
            //    "isv_domain": true,
            //    "isv_format": true,
            //    "isv_mx": true,
            //    "isv_noblock": true,
            //    "isv_nocatchall": true,
            //    "isv_nogeneric": true,
            //    "score": 90,
            //}
            $table->id();
            $table->string('email')->unique();
            $table->integer('results');
            $table->boolean('format');
            $table->boolean('catchall');
            $table->boolean('domain');
            $table->boolean('noblock');
            $table->boolean('nogeneric');
            $table->string('status');
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
