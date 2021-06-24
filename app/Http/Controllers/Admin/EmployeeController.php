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

class EmployeeController extends Controller
{
    
    public function index(Request $request){
        $data = [ 'label' => 'Employee' ];
        return view('admin.employee.list')->with($data);
    }

    public function getEdit(Request $request){
        $response = User::with(['department','designation'])->where('id', $request->id)->whereIn('is_active', constants('is_active'))->first();
        return response()->json($response);
    }

    public function getData(Request $request){
        $path = sendPath(constants('dir_name.user'));

        $columns = array(          
            0 => 'emp.id',
            1 => 'emp.firstname',
            2 => 'emp.email',
            3 => 'emp.profile',
            4 => 'emp.created_at',
        );

        $sql = "select emp.* from users emp WHERE emp.is_active='".constants('is_active.active')."' and emp.type='".constants('user_type.Employee')."' ";
        $query = qry($sql);
        $totalData = count($query);
        $totalFiltered = $totalData;

        if (!empty($request['search']['value'])) {   
            $searchString = "'%" . str_replace("'", "", $request['search']['value']) . "%'"; 
            $sql .= " and ( emp.firstname LIKE " . $searchString;
            $sql .= " OR emp.lastname LIKE " . $searchString;
            $sql .= " OR emp.email LIKE " . $searchString;
            $sql .= " OR emp.mobile LIKE " . $searchString;
            $sql .= " OR emp.passport_number LIKE " . $searchString . ")";
        }

        $query = qry($sql);
        $totalFiltered = count($query);

        $sql .= " ORDER BY " . $columns[$request->order[0]['column']] . "   " . $request->order[0]['dir'] . " LIMIT " . $request->start . " ," . $request->length . "   ";  
        $query = qry($sql);

        $data = array();

        $cnts = $request->start + 1;
        foreach ($query as $row) {
            $edit = ''; $isDeployed = '';
            $view = "<a href='' class='btn btn-primary btn-sm editit' data-id='".$row->id."'>View</a>";
            $delete = ' <a href="javascript:void(0)" class="btn btn-rounded btn-outline-danger deleteitt" data-id="'.$row->id.'" title="delete this"><i class="far fa-trash-alt"></i></a>';
          
            $nestedData = array();
            $nestedData[] = $row->id;
            $nestedData[] = $row->firstname." ".$row->lastname;
            $nestedData[] = $row->email;

            $imgTag = '';
            if($row->profile!=''){
                $imgTag = '<div class="avatar avatar-lg"><img class="avatar-img rounded-circle" alt="'.$row->name.'" src="'.$path.$row->profile.'" onclick="imgDisplayInModal(this.src)" ></div>';
            }
            $nestedData[] = $imgTag;

            $edit = '<a href="javascript:void(0)" class="btn btn-rounded btn-outline-primary editit" data-id="'.$row->id.'" title="edit this"><i class="fas fa-pen-square"></i></a>';

            $nestedData[] = $edit." ".$delete;
            $nestedData['DT_RowId'] = "r" . $row->id;
            $data[] = $nestedData;
            $cnts++;
        }

        $json_data = array(
            "draw" => intval($request['draw']), 
            "recordsTotal" => intval($totalData), 
            "recordsFiltered" => intval($totalFiltered), 
            "data" => $data
        );

        echo json_encode($json_data);
    }

    public function addUpdate(Request $request) {
        try {

        $validator = Validator::make($request->all(), [ 
            'hid_employeeid' => 'required|integer|min:0',
            'employee_is_active' => 'required|numeric',
            'employee_designation' => 'required|integer|min:1',
            'employee_department' => 'required|integer|min:1',
            'employee_firstname' => 'required|string|max:100',
            'employee_lastname' => 'required|string|max:100',
            'employee_email' => 'required|email|string',
            'employee_mobile' => 'nullable|string|max:15|min:10',
            'employee_dob' => 'required|date_format:Y-m-d',
            'employee_joining_date' => 'required|date_format:Y-m-d',
            'employee_gender' => 'required|string',
            'employee_salary' => 'required|between:0,99999999999999.99',
            'employee_passport_number' => 'nullable|string',
            'employee_profile' => 'nullable|image|max:1024',
            'employee_passport_document' => 'nullable|mimes:pdf,jpg,jpeg,png,bmp,csv,xlt,xls,xlsx,xlsb,xlsm,xltx,xltm,txt,rtf|max:5120',
        ]);   

        if($validator->fails()) {  
            $response = ['msg' => $validator->errors()->first(), 'success' => 0 ];
            return response()->json($response);
        }

        if($request->hid_employeeid==0){

            $emailAddress = $request->employee_email;
            $mobileNumber = $request->employee_mobile;

            $count =  User::where('id','>', 0)
            ->where(function($queryEmail) use ($emailAddress) {
                    $queryEmail->where('email', $emailAddress)->whereNotNull('email');
            })
            ->orWhere(function($queryMobile) use ($mobileNumber) {
                    $queryMobile->where('mobile', $mobileNumber)->whereNotNull('mobile');
            })->count();

            if($count > 0){
                $response = ['msg' => 'This Mobile Number or Email Address is Already Registered.', 'success' => 0 ];
                return response()->json($response);
            }

            $insertData = [
                'name' => $request->employee_firstname." ".$request->employee_lasname,
                'firstname' => $request->employee_firstname,
                'lastname' => $request->employee_lastname,
                'email' => $request->employee_email,
                'mobile' => isset($request->employee_mobile) ? trim($request->employee_mobile) : NULL,
                'passport_number' => isset($request->employee_passport_number) ? trim($request->employee_passport_number) : NULL,
                'is_active' => ($request->employee_is_active==0) ? 0 : 1,
                'password' => $request->employee_password,
                'dob' => $request->employee_dob,
                'joining_date' => $request->employee_joining_date,
                'gender' => $request->employee_gender,
                'salary' => $request->employee_salary,
                'department_id' => $request->employee_department,
                'designation_id' => $request->employee_designation,
                'type' => constants('user_type.Employee'),
                'password' => isset($request->employee_password) ? bcrypt($request->employee_password) : bcrypt(uniqid()),
            ];

            $upload_img = '';
            if($request->file('employee_profile')!=''){
                $upload_img = UploadImage($request->file('employee_profile'), constants('dir_name.user'), "dp");
                $insertData['profile'] = $upload_img;
            }
            $upload_document = '';
            if($request->file('employee_passport_document')!=''){
                $upload_document = UploadImage($request->file('employee_passport_document'), constants('dir_name.user'), "dc");
                $insertData['passport_document'] = $upload_document;
            }
            $lastInsertData = User::create($insertData);

            if($lastInsertData->id > 0){
                $response = ['msg' => 'Added Successfully', 'success' => 1 ];
            }
            else
            {
                $response = ['msg' => 'Something Went Wrong. Please Try Again!!', 'success' => 0 ];
            }
            return response()->json($response);
        }
        else if($request->hid_employeeid > 0)
        {

            $emailAddress = $request->employee_email;
            $mobileNumber = $request->employee_mobile;

            $count =  User::where('id','>', 0)->where('id','!=', $request->hid_employeeid)
            ->where(function($queryCheck) use ($emailAddress, $mobileNumber) {
                    $queryCheck->where('email', $emailAddress)->whereNotNull('email');
                    $queryCheck->orWhere('mobile', $mobileNumber)->whereNotNull('mobile');
            })
            ->count();

            if($count > 0){
                $response = ['msg' => 'This Mobile Number or Email Address is Already Registered.', 'success' => 0 ];
                return response()->json($response);
            }


            $updateData = [
                'name' => $request->employee_firstname." ".$request->employee_lasname,
                'firstname' => $request->employee_firstname,
                'lastname' => $request->employee_lastname,
                'email' => $request->employee_email,
                'mobile' => isset($request->employee_mobile) ? trim($request->employee_mobile) : NULL,
                'passport_number' => isset($request->employee_passport_number) ? trim($request->employee_passport_number) : NULL,
                'is_active' => ($request->employee_is_active==0) ? 0 : 1,
                'dob' => $request->employee_dob,
                'joining_date' => $request->employee_joining_date,
                'gender' => $request->employee_gender,
                'salary' => $request->employee_salary,
                'department_id' => $request->employee_department,
                'designation_id' => $request->employee_designation,
            ];

            if(isset($request->employee_password)){
                $updateData['password'] = bcrypt($request->employee_password);
            }

            $upload_img = '';
            if($request->file('employee_profile')!=''){
                $upload_img = UploadImage($request->file('employee_profile'), constants('dir_name.user'), "dp");
                $updateData['profile'] = $upload_img;
                $this_file = isset($request->existing_employee_profile) ? $request->existing_employee_profile : 0;
                DeleteFile($this_file, constants('dir_name.user'));
            }
            $upload_document = '';
            if($request->file('employee_passport_document')!=''){
                $upload_document = UploadImage($request->file('employee_passport_document'), constants('dir_name.user'), "dc");
                $updateData['passport_document'] = $upload_document;
                $this_file = isset($request->existing_employee_passport_document) ? $request->existing_employee_passport_document : 0;
                DeleteFile($this_file, constants('dir_name.user'));
            }

            //dde($updateData);

            User::where('id', $request->hid_employeeid)->update($updateData);

            $response = ['msg' => 'Updated Successfully!', 'success' => 1 ];
            return response()->json($response);
        }
        else
        {
            $response = ['msg' => 'Something Went Wrong. Please Try Again!!', 'success' => 0 ];
            return response()->json($response);
        }
        } catch (\Exception $e) {
            Log::error($e);
            $response = ['msg' => 'Error '.$e->getMessage(), 'success' => 0 ];
            return response()->json($response);
        }
    }

    public function deleteEmployee(Request $request) {
        $request->validate([
             'id' => 'required|integer|min:1',
        ]);
         try {
            User::where('id', $request->id)->delete();
            $response = ['msg' => ' Deleted Successfully !', 'success' => 1, 'data' => 1];
            return response()->json($response);
         } catch (\Exception $e) {
            $response = ['msg' => 'Something Went Wrong. Please Try Again!!', 'success' => 0 ];
            return response()->json($response);
        }
    }


    














}
