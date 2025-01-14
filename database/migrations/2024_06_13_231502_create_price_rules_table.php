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
        Schema::create('price_rules', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBiginteger('collaborator_id');
            $table->foreign('collaborator_id')->references('id')
                 ->on('collaborators')->onDelete('cascade');

            $table->integer('quota');
            $table->string('operator');

            $table->float('price', 10, 3);

            $table->boolean('is_active')->default(true);

            $table->unsignedBiginteger('created_by')->nullable();
            $table->unsignedBiginteger('updated_by')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('price_rules');
    }
};
