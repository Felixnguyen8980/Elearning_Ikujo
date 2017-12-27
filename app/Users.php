<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    public function Roles(){
    	return $this->belongsTo(Roles::class,'role_id','id');
    }
    public function Admins(){
    	if($this->role_id == 1){
    		return $this->hasOne(Admins::class,'user_id','id');
    	} 
    	return null;
    }
    public function Centers(){
    	if($this->role_id == 2){
    		return $this->hasOne(Centers::class,'user_id','id');
    	} 
    	return null;
    }
    public function Students(){
    	if($this->role_id == 3){
    		return $this->hasOne(Students::class,'user_id','id');
    	} 
    	return null;
    }

    public function save(array $options = []){
    	parent::save($options);
    	if($this->role_id == 1){
    		$admin = new Admins;
    		$admin->user_id = $this->id;
    		return $admin->save();    
    	}
    	if($this->role_id == 2){
    		$center = new Centers;
    		$center->user_id = $this->id;
    		return $center->save(); 
    	}
    	if($this->role_id == 3){
    		$student = new Students;
    		$student->user_id = $this->id;
    		return $student->save();  		
    	}
    }

    public function login($username,$password){    
        $user = Users::where('username',$username)->where('password',$password)->distinct()->get();
        if ( count($user) > 0)
            return $user[0];
        return null;
    }
    public function detailUsedrs(){
        if($this->Students()!=null){
            return $this->Students();
        }
        if($this->Centers()!=null){
            return $this->Centers();
        }
        if($this->Admins()!=null){
            return $this->Admins();
        }
    }
}
