<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_boxes extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'category_boxes';

    public function scopeBox($query, $group_id, $type)
    {
        return $query->where([
            ['active', '=', '1'],
            ['group_id', '=', $group_id],
            ['type', '=', $type],
        ]);
    }
}
