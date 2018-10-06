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

    public function scopeNonDeletedItems($query, $group_id, $type, $is_under)
    {
        return $query->where([
            ['active', '<=', '1'],
            ['group_id', '=', $group_id],
            ['type', '=', $type],
            ['is_under', '=', $is_under],
        ])->orderBy('cat1_label', 'asc');
    }

    public function scopeDeletedItems($query, $group_id)
    {
        return $query->where([
            ['active', '=', '9'],
            ['group_id', '=', $group_id],
        ])->orderBy('updated_at', 'desc');
    }

//     public function scopeFetchBox($query, $group_id)
//     {
//         return $query->where([
//             ['group_id', '=', $group_id],
//             ['type', '=', '1'],
//         ])->orderBy('cat1_label', 'asc');
//     }

    public function scopeGetLabel($query, $id)
    {
        return $query->where('id', '=', $id);
    }
}
