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
        Schema::create('contraceptives', function (Blueprint $table) {
            $table->id();
            $table->string('method');
            $table->date('due_date');
            $table->datetime('reminder_date');
            $table->unsignedBigInteger("patient_id");
            $table->foreign("patient_id")->on("patients")->references("id");
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->on("users")->references("id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contraceptives');
    }
};
