<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name'     => 'Test User',
            'email'    => 'missaouimoez17@gmail.com',
            'password' => Hash::make('moez'),
        ]);

        \App\Models\User::factory()->create([
            'name'     => 'Hamouda Chekir',
            'email'    => 'hamoudachkir@yahoo.fr',
            'password' => Hash::make('hamouda'),
        ]);
    }
}
