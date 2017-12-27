<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->newUsers('adminIkujo@gmail.com','adminIkujo','Nam150596','1');
        $this->newUsers('sakuracenter@gmail.com','sakuracenter','Nam150596','2');
        $this->newUsers('student0@gmail.com','student0','Nam150596','3');
        $this->newUsers('kyodaicenter@gmail.com','kyodaicenter','Nam150596','2');
        $this->newUsers('student1@gmail.com','student1','Nam150596','3');


    }
    public function newUsers($email,$username,$password,$role){
    	$user = new App\Users;
    	$user->email = $email;
    	$user->username = $username;
    	$user->password = md5($password);
    	$user->role_id = $role;
    	$user->save();
    }
}
