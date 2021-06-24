<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use App\Models\User as Employee;
use App\Models\Designation;
use App\Models\Department;



class AuthController extends Controller
{

    public function login(Request $request)
    {
        try {
        $validator = Validator::make($request->all(), [ 
            'email' => 'required|email|string',
            'password' => 'required|string'
        ]);

        if($validator->fails()) {  
            $response = ['msg' => 'Validation Failed, Please Check Properly.', 'success' => 0 ];
            return response()->json($response, 400);
        }

        $dataEmployee = Employee::where('email', $request->email)->where('is_active', constants('is_active.active'))->where('type', constants('user_type.Employee'))->first();

        if(!empty($dataEmployee)){
            if (password_verify($request->password, $dataEmployee->password)) 
            {
                $accessToken = $dataEmployee->createToken('AuthToken')->accessToken;
                $response = [ 'user' => $dataEmployee, 'access_token' => $accessToken, 'msg' => 'Succesfully Logged In.', 'success' => 1 ];
                return response()->json($response, 200);
            }
            else
            {
                $response = ['msg' => 'Email or Password is Wrong.', 'success' => 0 ];
                return response()->json($response, 400);
            }
        }
        else
        {
            $response = ['msg' => 'Email Not Found!', 'success' => 0 ];
            return response()->json($response, 400);
        }
        } catch (\Exception $e) {
            $response = ['msg' => 'Something Went Wrong.', 'success' => 0 ];
            return response()->json($response, 400);
        }
    }

    public function departmentList(Request $request)
    {
        try {
        $dataDepartment = Department::where('is_active', constants('is_active.active'))->paginate(2);
        $response = [ 'data' => $dataDepartment, 'msg' => '', 'success' => 1 ];
        return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = ['msg' => 'Something Went Wrong.', 'success' => 0 ];
            return response()->json($response, 400);
        }
    }

    public function designationList(Request $request)
    {
        try {
        $dataDesignation = Designation::where('is_active', constants('is_active.active'))->paginate(2);
        $response = [ 'data' => $dataDesignation, 'msg' => '', 'success' => 1 ];
        return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = ['msg' => 'Something Went Wrong.', 'success' => 0 ];
            return response()->json($response, 400);
        }
    }

    public function employeeList(Request $request)
    {
        try {
        $searched = '';
        if(isset($request->search) && trim($request->search)!=''){
            $searched = $request->search;
        }
        $dataEmployee = Employee::where('type', constants('user_type.Employee'))
            ->where(function($querySearch) use ($searched) {
              if($searched!=''){
                $querySearch->where('firstname', 'LIKE', $searched.'%');
                $querySearch->orWhere('lastname', 'LIKE', '%'.$searched.'%');
                $querySearch->orWhere('email', 'LIKE', '%'.$searched.'%');
                $querySearch->orWhere('mobile', 'LIKE', '%'.$searched.'%');
                $querySearch->orWhere('passport_number', 'LIKE', '%'.$searched.'%');
                $querySearch->orWhere('name', 'LIKE', '%'.$searched.'%');
              }
              })
            ->where('is_active', constants('is_active.active'))
            ->paginate(10);

        $response = [ 'data' => $dataEmployee, 'msg' => '', 'success' => 1 ];
        return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = ['msg' => 'Something Went Wrong.', 'success' => 0 ];
            return response()->json($response, 400);
        }
    }




}
