<?php

namespace Database\Seeders;

use App\Models\station;
use Illuminate\Database\Seeder;

class StationSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Station::create(['name'=> 'Cairo']);
        Station::create(['name'=> 'Alexandria']);
        Station::create(['name'=> 'Gizeh']);
        Station::create(['name'=> 'Asyut']);
        Station::create(['name'=> 'Fayyum']);
        Station::create(['name'=> 'Aswan']);
        Station::create(['name'=> 'Beni Suef']);
        Station::create(['name'=> 'al-Minya']);
        Station::create(['name'=> 'Sohag']);
        Station::create(['name'=> 'Ismailia']);
        Station::create(['name'=> 'Hurghada']);
    }
}
