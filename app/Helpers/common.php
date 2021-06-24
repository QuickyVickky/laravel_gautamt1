<?php

date_default_timezone_set('Asia/Kolkata');
use App\Models\User;

function dde($arr){
    echo "<pre>"; print_r($arr); die;
}

function qry($str,$return_in_array=0){
    $data = DB::select($str);
    if($return_in_array!=1){
        return $data;
    }
    else
    {
        return json_decode(json_encode($data), true);
    }
    
}
function insert_data($tbl,$data){
	DB::table($tbl)->insert($data);
}

function insert_data_id($tbl,$data){
	$id = DB::table($tbl)->insertGetId($data);
	return $id;
}

function update_data($tbl,$data,$con){
	$affected_id = DB::table($tbl)->where($con)->update($data);
	return $affected_id;
}

function UploadImage($file, $dir,$filename_prefix='',$fileName='') {
    if($fileName==''){
        $fileName = $filename_prefix.uniqid().time() . '.' . $file->getClientOriginalExtension();
    }
    else
    {
       $fileName = $filename_prefix. $fileName. '.' . $file->getClientOriginalExtension(); 
    }
    Storage::disk('public')->putFileAs($dir, $file, $fileName);
    return $fileName;
}

function DeleteFile($filename, $dir) {
    $existImage = storage_path() . '/app/public/' . $dir . '/' . $filename;
        if (File::exists($existImage)) {
            File::delete($existImage);
        }
    return 1;
}

function constants($key=''){
    if(trim($key=='')){
        return 0;
    }
    else
    {
        return Config::get('constants.'.$key);
    }
}

function uuid(){
    return uniqid().time().mt_rand(10000,99999);
}

function sendPath($dir=''){
    return asset('storage').'/'.$dir.'/';
}
