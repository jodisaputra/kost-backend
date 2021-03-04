<?php

use Illuminate\Database\Seeder;
use App\Models\BoardingHouse;
use App\Models\BoardingRoom;

class BoardingHouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(BoardingHouse::class, 200)->create()->each(function ($boarding_house) {
            $boarding_house->room()->save(factory(BoardingRoom::class)->make());
        });
    }
}
