<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
            'lokasi' => 'WAAA',
            'lat' => '05 04 S',
            'lot' => '119 33 E',
            'koordinate' => '0504S 11933E',
            'keterangan' => 'makassar',
        ]);

        Location::create([
            'lokasi' => 'WIII',
            'lat' => '06 07 S',
            'lot' => '106 39 E',
            'koordinate' => '0607S10639E',
            'keterangan' => 'cengkareng',
        ]);

        Location::create([
            'lokasi' => 'WARR',
            'lat' => '07 23 S',
            'lot' => '112 47 E',
            'koordinate' => '0723S11247E',
            'keterangan' => 'surabaya',
        ]);

        Location::create([
            'lokasi' => 'WIMM',
            'lat' => '03 38 N',
            'lot' => '098 53 E',
            'koordinate' => '0338N09853E',
            'keterangan' => 'medan',
        ]);

        Location::create([
            'lokasi' => 'WAMM',
            'lat' => '01 33 N',
            'lot' => '124 55 E',
            'koordinate' => '0133N12455E',
            'keterangan' => 'manado',
        ]);
    }
}
