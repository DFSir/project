<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //标签和文章的关系

    public function articles()
    {
      return $this->belongsToMany('App\Models\Articles');

    }
}
