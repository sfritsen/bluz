<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DD_menus extends Model
{
    protected $primaryKey = 'menu_id';
    protected $table = 'dd_menus';

    public function scopeGetMenu($query, $group_id, $parent_id)
    {
        return $query->where([
            ['active', '=', '1'],
            ['group_id', '=', $group_id],
            ['parent_id', '=', $parent_id],
            ['type', '=', '3'],
        ])->orderBy('menu_text');
    }
}
