<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    //
    public function FileTypes(){
    	return $this->belongsTo(FileTypes::class,'filetype_id','id');
    }
    
    public function Lessons(){
    	return $this->belongsTo(lessons::class,'lesson_id','id');
    }
}
