<?php

use Illuminate\Database\Seeder;

class FileTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->newFileTypes('video');
        $this->newFileTypes('document');
        $this->newFileTypes('Audio');
    }
    public function newFileTypes($name){
    	$type = new App\FileTypes;
    	$type->name =$name;
    	$type->save();
    }
}
