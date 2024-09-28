<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProjetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projets')->insert([
            [
                'nom' => 'Projet Alpha',
                'description' => 'Ceci est une description du projet Alpha.',
                'date_debut' => Carbon::now()->subDays(10),
                'date_fin' => Carbon::now()->addDays(30),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nom' => 'Projet Beta',
                'description' => 'Description du projet Beta.',
                'date_debut' => Carbon::now()->subDays(20),
                'date_fin' => Carbon::now()->addDays(20),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nom' => 'Projet Gamma',
                'description' => 'Description du projet Gamma.',
                'date_debut' => Carbon::now()->subDays(15),
                'date_fin' => Carbon::now()->addDays(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
