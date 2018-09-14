<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'permissions';
    protected $fillable = [
        'user_id',
    ];
}
