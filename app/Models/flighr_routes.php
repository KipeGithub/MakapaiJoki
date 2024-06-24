<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class flighr_routes extends Model
{
    use HasFactory;
    protected $fillable = [
        'departure_aero',
        'destination_aero',
        'routes',
        'est_waktu',
        'speed',
        'flight_level'
        ];
}
