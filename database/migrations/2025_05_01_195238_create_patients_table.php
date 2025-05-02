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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('health_insurance_id'); //fk
            $table->string('name');
            $table->string('surname');
            $table->date('birth_date');
            $table->enum('gender', ['Mashkull', 'Femer']); 
            $table->enum('blood_type', ['A+', 'A-', 'B+', 'B-','AB+','AB-', '0+', '0-'])->nullable(); 
            $table->string('phone', 20);
            $table->string('email');
            $table->string('personal_id')->unique();
            $table->string('emergency_contact_number', 20)->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
