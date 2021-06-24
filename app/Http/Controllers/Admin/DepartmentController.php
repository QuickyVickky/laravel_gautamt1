<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    



    public function getDepartmentInDropdown(Request $request){
        $dataArray = [];
        try {
            $searchTerm = ''; 
            if(isset($request->searchTerm)) {
                $searchTerm = $request->searchTerm;
            }

            $dataReturned = Department::where('is_active', constants('is_active.active'))
            ->where(function($querySearch) use ($searchTerm) {
                    $querySearch->where('title','LIKE', '%'.$searchTerm.'%');
            })
            ->orderBy('id','ASC')
            ->limit(25)
            ->get();


            foreach($dataReturned as $key => $value) {
                $dataArray[] = [
                "text" => $value->title,
                "id" => $value->id,
                ];
            }
            return response()->json($dataArray);
        } catch (\Exception $e) {
            Log::error($e);
            return [];
        }
    }
    
}
