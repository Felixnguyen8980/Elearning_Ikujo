<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lessons extends Model
{
    //
    public function Courses(){
    	return $this->belongsTo(Courses::class,'course_id','id');
    }
    public function Files(){
    	return $this->hasMany(Files::class,'lesson_id','id');
    }
}
