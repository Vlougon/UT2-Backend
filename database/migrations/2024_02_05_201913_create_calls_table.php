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
        Schema::create('calls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();;
            $table->foreignId('beneficiary_id')->constrained()->cascadeOnDelete();;
            $table->date('date');
            $table->timestamp('time');
            $table->integer('duration');
            $table->enum('call_type', ["rutinary","emergency"]);
            $table->enum('turn', ["morning","afternoon","night"]);
            $table->boolean('answered_call');
            $table->text('observations');
            $table->text('description');
            $table->boolean('contacted_112');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calls');
    }
};
