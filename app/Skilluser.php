<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skilluser extends Model
{

    protected $table = 'skill_user';
    protected $primaryKey = 'skill_id';

    protected $fillable =  [
        'skill_id',
        'user_id',
        'level'
    ];
}
