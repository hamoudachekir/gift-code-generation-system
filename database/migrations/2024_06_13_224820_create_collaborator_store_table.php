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
        Schema::create('collaborator_store', function (Blueprint $table) {
            $table->id();

            $table->unsignedBiginteger('collaborator_id');
            $table->unsignedBiginteger('store_id');


            $table->foreign('collaborator_id')->references('id')
                 ->on('collaborators')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collaborator_store');
    }
};
