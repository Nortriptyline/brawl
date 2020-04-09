<?php

use Illuminate\Database\Seeder;

class TournamentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Tournament::class, 75)->create()->each(function($tournament) {
            $tournament->tsetting()->save(factory(App\Tsetting::class)->make());
        });
    }
}
