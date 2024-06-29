<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FPL extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'filling_time',
        'priority',
        'message_type',
        'number',
        'reference_data',
        'aircraft_id',
        'ssr_mode',
        'ssr_code',
        'flight_rules',
        'type_of_flight',
        'number_aircraft',
        'type_of_aircraft',
        'wake_turb_cat',
        'equipment_1',
        'equipment_2',
        'depad',
        'time',
        'cruising_speed',
        'level',
        'route',
        'dest_ad',
        'total_set_hh_min',
        'altn_ad',
        'second_altn_ad',
        'other_fpl_i',
    ];

    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function toUser()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }
}
