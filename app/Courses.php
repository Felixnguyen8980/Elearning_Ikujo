<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    //
    public function Centers(){
    	return $this->belongsTo(Centers::class,'center_id','id');
    }
    public function Lessons(){
    	return $this->hasMany(Lessons::class,'course_id','id');
    }
}
