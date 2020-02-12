<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skilluserid extends Model
{
    protected $table = 'skill_user';
    protected $primaryKey = 'user_id';

    protected $fillable =  [
        'skill_id',
        'user_id',
        'level'
    ];
}
