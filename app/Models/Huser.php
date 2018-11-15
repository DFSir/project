<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Huser extends Model
{
    // 
    protected $table = 'homeusers';
    protected $primaryKey = 'uid';

    // 与用户详情表建立一对一联系
   	public function huserinfo()
   	{
        return $this->hasOne('App\Models\Detail','uid','uid');
   	}
}
