<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    //
    protected $table = 'messages';
    protected $primaryKey = 'mid';

    // 与用户表建立一对一联系
   	public function usersinfo()
   	{
        return $this->hasOne('App\Models\Huser','uid','uid');
   	}

   	// 与用户表建立一对一联系
   	public function husersinfo()
   	{
        return $this->hasOne('App\Models\Detail','uid','uid');
   	}

}
