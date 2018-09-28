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

    public function scopeAllBoxItems($query, $group_id, $type)
    {
        return $query->where([
            ['group_id', '=', $group_id],
            ['type', '=', $type],
        ]);
    }

    public function scopeFetchBox($query, $group_id)
    {
        return $query->where([
            // ['active', '=', '1'],
            ['group_id', '=', $group_id],
            ['type', '=', '1'],
        ])->orderBy('cat1_label', 'asc');
    }
}
