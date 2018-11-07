<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    //
    protected $table = 'feedbacks';
    protected $primaryKey = 'fid';


    public function huserfeedbacks()
    {
        return $this->hasOne('App\Models\Huser','uid','senderid');
    }

}
