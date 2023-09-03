<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CitySeeder extends Seeder {

    /**
     * Seed the application's database.
     */
    public function run(): void {
        $cities = Storage::disk('local')->get('seeds' . DIRECTORY_SEPARATOR . 'cities.csv');
        if (empty($cities)) {
            return;
        }

        $cities = explode("\n", $cities);
        if (empty($cities)) {
            return;
        }

        $states = State::all()->keyBy('ibge')->toArray();
        foreach ($cities as $city) {
            $city = str_getcsv($city);
            if (!isset($city[2])){
                continue;
            }

            City::create([
                'name'     => trim($city[2]),
                'ibge'     => trim($city[1]),
                'uf'       => $states[(int)$city[0]]['uf'],
                'state_id' => $states[(int)$city[0]]['id']
            ]);
        }
    }
}
