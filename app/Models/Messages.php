<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    //
    protected $table = 'messages';
    protected $primaryKey = 'mid';

    // 与文章类别表建立一对一联系
   	public function usersinfo()
   	{
        return $this->hasOne('App\Models\Huser','uid','uid');
   	}

}
