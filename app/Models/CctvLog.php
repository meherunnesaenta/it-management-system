<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CctvLog extends Model
{
    use HasFactory;

    protected $fillable = ['camera_id', 'camera_location', 'start_time', 'end_time', 'duration', 'recorded_by'];
}
