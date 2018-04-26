<?php

use Illuminate\Database\Seeder;

class MedicinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicines')->insert([
            'naming' => 'Paracetamol Biogaran',
        ]);

        DB::table('medicines')->insert([
            'naming' => 'Motilium',
        ]);

        DB::table('medicines')->insert([
            'naming' => 'Celestene',
        ]);

        DB::table('medicines')->insert([
            'naming' => 'Diamicron',
        ]);
    }
}
