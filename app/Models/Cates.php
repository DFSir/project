<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cates extends Model
{
	// 设置模型操作的数据表
	public $table = 'cates';
    // 设置模型主键
   	public $primaryKey = 'cid';
}
