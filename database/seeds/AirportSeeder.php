<?php

use \App\Airport;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class AirportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aip_list = Storage::disk('local')->get('airports.json');
        $aip_list = json_decode($aip_list);

        foreach($aip_list as $apt){
            Airport::create([
                'ICAO' => $apt->code,
                'name' => $apt->name
            ]);
        }
    }
}
