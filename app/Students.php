<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    //
    public function Users(){
    	return $this->belongsTo(Users::class,'user_id','id');
    }
}
