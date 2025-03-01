<?php

use App\Models\Role;
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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            
            $table->unsignedBiginteger('created_by')->nullable();
            $table->unsignedBiginteger('updated_by')->nullable();
            
            $table->timestamps();
        });

        Role::insert([
            [
                'id'     => 1,
                'title'  => 'Admin'
            ],
            [
                'id'     => 2,
                'title'  => 'Collaborator'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
