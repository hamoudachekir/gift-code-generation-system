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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->unsignedBiginteger('collaborator_id')->nullable();
            $table->foreign('collaborator_id')->references('id')
                 ->on('collaborators')->onDelete('cascade');

            $table->boolean('is_active')->default(true);
            
            $table->unsignedBiginteger('role_id')->default(1);
            $table->foreign('role_id')->references('id')
                 ->on('roles')->onDelete('cascade');

            $table->rememberToken();

            $table->dateTime('last_login')->nullable();

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
        Schema::dropIfExists('users');
    }
};
