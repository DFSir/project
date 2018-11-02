<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    // 设置模型操作的数据表
    public $table = 'articles';

    // 设置模型主键
   	public $primaryKey = 'aid';

   	// 与文章类别表建立一对一联系
   	public function catesinfo()
   	{
        return $this->hasOne('App\Models\Cates','cid','cid');
   	}

    // 与用户表建立一对一联系
    public function userinfo()
    {
        return $this->hasOne('App\Models\Huser','uid','uid');
    }

   	// 与评论表建立一对多联系
    public function commentinfo()
    {
        return $this->hasMany('App\Models\Comments','aid');
    }

}
