<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class meteo extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'filling_time',
        'priority',
        'message_id_part1',
        'message_id_part2',
        'message_id_part3',
        'origin',
        'issued',
        'type',
        'location',
        'observed',
        'free_text_metar',
        'file',
        'filled_by',

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
