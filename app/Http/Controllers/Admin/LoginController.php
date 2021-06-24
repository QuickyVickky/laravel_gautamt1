<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
date_default_timezone_set('Asia/Kolkata');
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Models\User;


class LoginController extends Controller
{

	public function index(){
		if(Session::get('adminid')!=''){
			return redirect()->route('employee-list');
		}
		else
		{
			return view('admin.login.login');	
		}
	}

    public function login(Request $request){
    	try {

    	$validator = Validator::make($request->all(), [ 
            'email' => 'required|email',
            'password' => 'required|string',
        ]);   
        if($validator->fails()) {  
            Session::flash('msg', 'Validation failed.');
            Session::flash('cls', 'danger');
            return redirect()->route('loginpage');
        }

		$dataAdmin = User::where('email', $request->email)->where('type', constants('user_type.Admin'))->where('is_active', constants('is_active.active'))->first();

		if(!empty($dataAdmin)){
			if (!password_verify($request->password, $dataAdmin->password)) 
			{
    			Session::flash('msg', 'Email or Password is wrong !');
    			Session::flash('cls', 'danger');
            	return redirect()->route('loginpage');
			}
			else
			{
				Session::put('adminid', $dataAdmin->id);
				Session::put('adminfullname', $dataAdmin->name);
				Session::put('adminemail', $dataAdmin->email);
        		return redirect()->route('employee-list');
			}
		}
		else
		{
			Session::flash('msg', 'Not found !');
            return redirect()->back();
		}

		} catch (\Exception $e) {
            Log::error($e);
            Session::flash('msg', 'Error, Something Went Wrong.');
            Session::flash('cls', 'danger');
            return redirect()->back();
        }
	}


	public function logOut(Request $request) {
        $request->session()->flush();
        return redirect()->route('loginpage');
    }













}
