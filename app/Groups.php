<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'groups';

    public function scopeGroupData($query, $label)
    {
        return $query->where('label', '=', $label);
    }
}
