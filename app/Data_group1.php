<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_group1 extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'data_group1s';
    protected $fillable = array(
        'phone_number',
        'lynx',
        'chat_session_id',
        'incident_type',
        'equip_type',
        'resolution',
        'client_no_ts',
        'troubleshooting',
        'cat_box_1',
        'cat_box_2',
        'cat_box_3',
        'additional_notes'
    );
}
