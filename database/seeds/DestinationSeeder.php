<?php

use App\Models\Agenda;
use App\Models\Destination;
use App\Models\Participant;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Destination::class, 50)->create()->each(function($dest) {
            factory(Agenda::class, mt_rand(3, 5))->create([
                'destination_id' => $dest->id,
            ]);
            factory(Participant::class, mt_rand(3, 5))->create([
                'destination_id' => $dest->id,
            ]);
        });
    }
}
