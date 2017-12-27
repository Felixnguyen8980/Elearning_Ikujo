<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App;
class StudentController extends Controller
{
    //
    public function handle_request(Request $request){
    	$option = ($request->option !=null)? $request->option:"home";
    	switch ($option){
    		case 'home':
    			return $this->home();
    			break;
            case 'Center':
                return $this->Center($request->id);
                break;
            case 'Lesson':
                return $this->Lesson($request->id);
                break;
             case 'lessonAudio':
                return $this->lessonAudio($request);
            break;
             case 'lessonVideo':
                return $this->lessonVideo($request);
            break;
            case 'lessonDocument':
                return $this->lessonDocument($request);
            break;
    		default:
                    //Session::flush();
    				return $option;exit();
    			break;
    	}
    }
    public function home(){
        $Centers = App\Centers::all();
    	return view('student/home')->with(['Centers'=>$Centers]);
    }
    public function Center($id){
        $Centers = App\Centers::all();
        $Center = App\Centers::find($id);
        $Courses = $Center->Courses;
        $Lessons = array();
        foreach ($Courses as $course) {
            $Lessons[] = $course->Lessons;
        }
        // echo "here";exit();
        return view('student/center')->with(['Centers'=>$Centers,'Courses'=>$Courses,'Lessons'=>$Lessons]);
    }
    public function Lesson($id){
         $Centers = App\Centers::all();
        $Lesson = App\Centers::find($id);
        return view('student/lesson')->with(['Centers'=>$Centers,'Lesson'=>$Lesson]);
    }
    public function lessonAudio(Request $request){
        $Lesson = App\Lessons::find($request->Lesson_id);
        $Files =  $Lesson->Files;
        $Audios = array();
        foreach ($Files as $File) {
            if ($File->filetype_id == 3){
                $Audios[] = $File;
            }
        }
        return view('student/lessonsaudio')->with(['Audios'=>$Audios]);
    }
    public function lessonVideo(Request $request){
        $Lesson = App\Lessons::find($request->Lesson_id);
        $Files =  $Lesson->Files;
        $Videos = array();
        foreach ($Files as $File) {
            if ($File->filetype_id == 1){
                $Videos[] = $File;
            }
        }
        return view('student/lessonsvideo')->with(['Videos'=>$Videos]);
    }
    public function lessonDocument(Request $request){
        $Lesson = App\Lessons::find($request->Lesson_id);
        $Files =  $Lesson->Files;
        $Documents = array();
        foreach ($Files as $File) {
            if ($File->filetype_id == 2){
                $Documents[] = $File;
            }
        }
        return view('student/lessonsdocument')->with(['Documents'=>$Documents]);
    }
}
