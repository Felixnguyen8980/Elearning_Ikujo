<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Centers extends Model
{
    //
    public function Users(){
    	return $this->belongsTo(Users::class,'user_id','id');
    }
    public function Courses(){
    	return $this->hasMany(Courses::class,'center_id','id');
    }
}
