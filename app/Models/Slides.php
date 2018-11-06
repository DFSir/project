<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slides extends Model
{
    // 链接数据表
    protected $table = 'slides';

    // 与文章详情表一对一
   	public function articleinfo()
   	{
        return $this->hasOne('App\Models\Articles','aid','aid');
   	}
}
