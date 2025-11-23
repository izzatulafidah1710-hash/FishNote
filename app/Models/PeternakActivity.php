<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeternakActivity extends Model
{
    protected $table = 'peternak_activities';
    protected $fillable = [
        'peternak_id',
        'activity_type',
        'description',
        'related_module',
        'related_id',
    ];
}
