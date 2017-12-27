<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App;
class CenterController extends Controller
{
    //
    public function handle_request(Request $request){
    	if(session('center')==null){
    		$option = ($request->option !="login")? "loginpage":"login";
    	} else {
    		$option = ($request->option !=null)? $request->option:"home";
    	}
    	switch ($option){
    		case 'loginpage':
    			return $this->loginpage();
    			break;
            case 'login':
                return $this->login($request);
                break;
            case 'home':
                return $this->home();
                break;
            case 'logout':
                return $this->logout();
                break;
            case 'loadCourses':
                return $this->loadCourses();
                break;
            case 'addCourses':
                return $this->addCourses($request);
                break;
            case 'addCourses':
                return $this->addCourses();
                break; 
            case 'addLessons':
                return $this->addLessons($request);
                break; 
            case 'LoadCourseDetail':
                return $this->LoadCourseDetail($request);
                break;
            case 'LoadLessonDetail':
                return $this->LoadLessonDetail($request);
            break;
            case 'AddAudio':
                return $this->AddAudio($request);
            break;
            case 'AddDocument':
                return $this->AddDocument($request);
            break;
            case 'AddVideo':
                return $this->AddVideo($request);
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
            case 'deletefile':
                return $this->deletefile($request);
            break;
            case 'deletelesson':
                return $this->deletelesson($request);
            break;
         
    		default:
                    //Session::flush();
    				return $option;
    			break;
    	}
    }
    //login + logout FUNCTION
	public function loginpage(){
    	return view('center/login');
	}
    public function login(Request $request){
        $User =new App\Users;
       // echo md5($request->password);
        $login = $User->login($request->username,md5($request->password));
        if($login){
            if($login->Centers()){
                session()->put('center', $login);
                return redirect()->route('centerpage',['option'=>'home']);
            } else {
                 return view('center/login')->with('loginabort','Your account is denied');
            }
        } else {
            return view('center/login')->with('loginabort','Your account '.$request->username.
            ' does not exit');
        }
    }
    public function logout(){
        Session::flush();
        return redirect()->route('centerpage',['option'=>"login"]);
    }
    //home FUNCTION
    public function home(){
        return view('center/home');
    }
    public function loadCourses(){
        $center_id = session('center')->Centers->id;
        $Center = App\Centers::find($center_id);
        $Courses = $Center->Courses;
        return view('center/courses')->with('Courses',$Courses);
    }
    public function addCourses(Request $request){
       if ($request->CourseName){
           $Course = new App\Courses;
           $Course->name = $request->CourseName;
           $Course->center_id = session('center')->Centers->id;
           $result = $Course->save();
           if ($result){
               return "Saved Course";
           } else {
                return "Something went wrong";
           }
       } else {
            return "input Course's Name";
       }
    }
    //function Lessons
    public function LoadCourseDetail(Request $request){
        $Course = App\Courses::find($request->Course_id);
        $Lessons = $Course->Lessons;
        return view('center/lessons')->with(['Lessons'=>$Lessons,'Course_id'=>$request->Course_id]);
    }
    public function addLessons(Request $request){
        if ($request->LessonName){
            $Lesson = new App\Lessons;
            $Lesson->course_id = $request->Course_id;
            $Lesson->name = $request->LessonName;
            $result = $Lesson->save();
            if ($result){
               return "Saved Lesson";
            } else {
                return "Something went wrong";
           }
        }  else {
            return "input Lesson's Name";
       }
    }   

    public function LoadLessonDetail(Request $request){
        $Lesson = App\Lessons::find($request->Lesson_id);
        return view('center/lessonsdetail')->with(['Lesson'=>$Lesson]);
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
        return view('center/lessonsaudio')->with(['Audios'=>$Audios]);
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
        return view('center/lessonsvideo')->with(['Videos'=>$Videos]);
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
        return view('center/lessonsdocument')->with(['Documents'=>$Documents]);
    }
    public function AddAudio(Request $request){
        $dir = 'public/files/Audios';
        $extension = $request->file('_file')->getClientOriginalExtension();
        $filename = uniqid().'_'.time().'_'.date('Ymd').'.'.$extension;
        $path = $request->file('_file')->storeAs($dir,$filename);
        $file = new App\Files;
        $file->lesson_id = $request->lessonid;
        $file->name = $request->name;
        $file->filetype_id = 3;
        $file->filename = $filename;
        $file->save();
        return "saved";
    } 
    public function AddDocument(Request $request){
        $dir = 'public/files/Documents';
        $extension = $request->file('_file')->getClientOriginalExtension();
        $filename = uniqid().'_'.time().'_'.date('Ymd').'.'.$extension;
        $path = $request->file('_file')->storeAs($dir,$filename);
        $file = new App\Files;
        $file->lesson_id = $request->lessonid;
        $file->name = $request->name;
        $file->filetype_id = 2;
        $file->filename = $filename;
        $file->save();
        return "saved";
    }
    public function AddVideo(Request $request){
        $dir = 'public/files/Videos';
        $extension = $request->file('_file')->getClientOriginalExtension();
        $filename = uniqid().'_'.time().'_'.date('Ymd').'.'.$extension;
        $path = $request->file('_file')->storeAs($dir,$filename);
        $file = new App\Files;
        $file->lesson_id = $request->lessonid;
        $file->name = $request->name;
        $file->filetype_id = 1;
        $file->filename = $filename;
        $file->save();
        return "saved";
    }
    public function deletefile(Request $request){
         $file = App\Files::find($request->video_id);
         $file->delete();
    }
     public function deletelesson(Request $request){
         $lesson = App\Lessons::find($request->lesson_id);
         $lesson->delete();
    }
}
