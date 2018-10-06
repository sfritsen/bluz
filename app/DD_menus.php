<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DD_menus extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'dd_menus';

    public function scopeGetMenus($query, $group_id, $parent_id, $type)
    {
        return $query->where([
            ['active', '<=', '1'],
            ['group_id', '=', $group_id],
            ['parent_id', '=', $parent_id],
            ['type', '=', $type],
        ])->orderBy('menu_text');
    }

    public function scopeGetMenu($query, $group_id, $parent_id)
    {
        return $query->where([
            ['active', '<=', '1'],
            ['group_id', '=', $group_id],
            ['parent_id', '=', $parent_id],
            ['type', '=', '2'],
        ])->orderBy('menu_text');
    }
    
    public function scopeDeletedItems($query, $group_id)
    {
        return $query->where([
            ['active', '=', '9'],
            ['group_id', '=', $group_id],
        ])->orderBy('updated_at', 'desc');
    }
    
    public function scopeGetLabel($query, $id)
    {
        return $query->where('id', '=', $id);
    }
}
