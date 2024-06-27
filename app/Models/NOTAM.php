<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notam extends Model
{
    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'from',
        'to',
        'filling_time',
        'priority',
        'message_series_0',
        'message_series_1',
        'number_0',
        'number_1',
        'number_2',
        'number_3',
        'identified',
        'fir',
        'notam_code_0',
        'notam_code_1',
        'traffic',
        'purpose',
        'scope',
        'lower_limit',
        'upper_limit',
        'coordinates',
        'location_0',
        'location_1',
        'location_2',
        'location_3',
        'fYYMMDDhhmm',
        'estperm',
        'time_schedule',
        'text_of_notam',
        'file_path',
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
