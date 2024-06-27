<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserWithRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.s
     *
     * @return void
     */
    public function run()
    {
        $admin = new User;
        $admin->username = 'CN-WAAAYFUA/OU-WAAA/0-WAAA/PRMD-WA/ADMD-ICAO/C-XX/';
        $admin->firstname = 'UPG (WAAA)';
        $admin->lastname = 'UJUNG PANDANG';
        $admin->email = 'upg@gmail.com';
        $admin->password = 'ujungpandang';
        $admin->role = 'admin';
        $admin->about = 'Kepala Bandara';
        $admin->save();

        $admin = new User;
        $admin->username = 'CN-WIIIYFUA/OU-WIII/0-WIII/PRMD-WI/ADMD-ICAO/C-XX/';
        $admin->firstname = 'CKG (WIII)';
        $admin->lastname = 'CENGKARENG';
        $admin->email = 'ckg@gmail.com';
        $admin->password = 'cengkareng';
        $admin->role = 'admin';
        $admin->about = 'Kepala Bandara';
        $admin->save();

        $admin = new User;
        $admin->username = 'CN-WARRYFUA/OU-WARR/0-WARR/PRMD-WA/ADMD-ICAO/C-XX/';
        $admin->firstname = 'SBY (WARR)';
        $admin->lastname = 'SURABAYA';
        $admin->email = 'sby@gmail.com';
        $admin->password = 'surabaya';
        $admin->role = 'admin';
        $admin->about = 'Kepala Bandara';
        $admin->save();

        $admin = new User;
        $admin->username = 'CN-WIMMYFUA/OU-WIMM/0-WIMM/PRMD-WI/ADMD-ICAO/C-XX/';
        $admin->firstname = 'KNO (WIMM)';
        $admin->lastname = 'MEDAN';
        $admin->email = 'kno@gmail.com';
        $admin->password = 'medan';
        $admin->role = 'admin';
        $admin->about = 'Kepala Bandara';
        $admin->save();
    }
}
