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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medical_card_id'); //fk
            $table->unsignedBigInteger('tests_id'); //fk
            $table->string('family_history')->nullable();;
            $table->string('surgeries')->nullable();
            $table->string('accidents')->nullable();
            $table->text('pregnancies')->nullable();
            $table->timestamps();

        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
