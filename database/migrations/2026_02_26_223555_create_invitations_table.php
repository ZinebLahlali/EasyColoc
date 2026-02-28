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
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['pending', 'accepted', 'refused', 'expired' ])->default('pending');
            $table->string('token');
            $table->date('expries_at')->nullable();
            $table->unsignedBigInteger('colocation_id');
            $table->foreign('colocation_id')->references('id')->on('colocations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};
