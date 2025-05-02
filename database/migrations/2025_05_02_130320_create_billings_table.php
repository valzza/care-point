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
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('appointment_id'); //fk
            $table->decimal('amount');
            $table->date('date');
            $table->string('method');
            $table->string('status');
            $table->timestamps();


            //$table->foreign('appointment_id')->references('id')->on('appointment')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billings');
    }
};
