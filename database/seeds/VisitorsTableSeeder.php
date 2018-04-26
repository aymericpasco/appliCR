<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class VisitorsTableSeeder extends Seeder
{

    private function dateToPassword($date) {
        return (
            $date->day . '-' .
            str_slug(str_limit($date->formatLocalized('%B'), $limit = 3, $end = ''))
            . '-' . $date->year
        );
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hiringDate = Carbon::create(1997, 12, 15);

        DB::table('users')->insert([
            'firstname' => 'Aymeric',
            'lastname' => 'Pasco',
            'email' => 'apasco@local.dev',
            'hiring_date' => $hiringDate,
            'phone' => '+33 6 67 81 09 58',
            'password' => bcrypt($this->dateToPassword($hiringDate)),
        ]);

        $hiringDate2 = Carbon::create(2004, 4, 9);

        DB::table('users')->insert([
            'firstname' => 'Jean',
            'lastname' => 'Cossart',
            'email' => 'jcossart@local.dev',
            'hiring_date' => $hiringDate2,
            'phone' => '+33 6 42 08 63 11',
            'password' => bcrypt($this->dateToPassword($hiringDate2)),
        ]);
    }
}
