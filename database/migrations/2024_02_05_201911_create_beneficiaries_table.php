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
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->varchar('dni');
            $table->enum('gender', ["Male","Female","Other"]);
            $table->enum('marital_status', ["Single","Engaged","Married","Divorced","Uncoupled","Widower"]);
            $table->enum('beneficiary_type', ["Above65","65-45","44-30","29-19","18-12","Below12"]);
            $table->string('social_security_number');
            $table->text('rutine');
            $table->string('first_surname');
            $table->string('second_surname');
            $table->date('birth_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiaries');
    }
};
