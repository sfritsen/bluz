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
        return $query->join('dd_menus as dd_parent', 'dd_menus.parent_id', '=', 'dd_parent.id')
        ->where([
            ['dd_menus.active', '=', '9'],
            ['dd_menus.group_id', '=', $group_id],
        ])->select(
            'dd_menus.*', 
            'dd_parent.menu_text as dd_parent'
        )->orderBy('dd_menus.updated_at', 'desc');
    }
    
    public function scopeGetLabel($query, $id)
    {
        return $query->where('id', '=', $id);
    }
}
