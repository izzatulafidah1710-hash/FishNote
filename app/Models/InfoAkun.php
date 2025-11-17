<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoAkun extends Model
{
    protected $table = 'infoakuns';

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'avatar',
        'status',
    ];
}
