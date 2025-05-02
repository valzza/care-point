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
        Schema::create('department__staff', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('department_id'); //fk
            $table->unsignedBigInteger('staff_id'); //fk
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('department__staff');
    }
};
