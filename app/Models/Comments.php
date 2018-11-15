<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    // 设置模型操作的数据表
    public $table = 'comments';

    // 设置模型主键
   	public $primaryKey = 'id';

   	// 与用户表建立一对一联系
    public function ucominfo()
    {
        return $this->hasOne('App\Models\Huser','uid','uid');
    }

    // 与用户表建立一对一联系
    public function hucominfo()
    {
        return $this->hasOne('App\Models\Detail','uid','uid');
    }
}
