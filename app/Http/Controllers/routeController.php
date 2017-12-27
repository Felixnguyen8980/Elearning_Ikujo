<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class routeController extends Controller
{
    //
    public function handle_request(Request $request){
    	$option = ($request->option !=null)?$request->option:"student";
    	switch ($option){
    		case 'student':
    			return redirect()->action('StudentController@handle_request',['option'=>"home",'id'=>null]);
    			break;
           	case 'center':
           		return redirect()->action('CenterController@handle_request','home');
           		break;
    		default:
                    //Session::flush();
    				return $option;
    			break;
    	}
    }
}
