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
        Schema::table('colocations', function (Blueprint $table) {
             $table->string('nom');
             $table->boolean('status');
             $table->bigInteger('owner_id')->unsigned()->index()->nullable();
             $table->foreign('owner_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('colocations', function (Blueprint $table) {
            //
        });
    }
};
