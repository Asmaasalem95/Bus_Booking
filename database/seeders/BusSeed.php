<?php

namespace Database\Seeders;

use App\Models\Bus;
use Database\Factories\BusFactory;
use Illuminate\Database\Seeder;

class BusSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bus::factory()->count(10)->create();
    }
}
