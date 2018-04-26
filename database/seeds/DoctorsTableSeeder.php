<?php

use Illuminate\Database\Seeder;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');
        foreach (range(1,10) as $index) {
            DB::table('doctors')->insert([
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'specialty' => 'Médecine appliquée au sport',
                'department' => $faker->departmentNumber,
            ]);
        }

        $faker2 = Faker\Factory::create('fr_FR');
        foreach (range(1,10) as $index) {
            DB::table('doctors')->insert([
                'firstname' => $faker2->firstName,
                'lastname' => $faker2->lastName,
                'address' => $faker2->address,
                'phone' => $faker2->phoneNumber,
                'department' => $faker2->departmentNumber,
            ]);
        }
    }
}
