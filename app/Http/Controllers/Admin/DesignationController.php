<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;

class DesignationController extends Controller
{
    





    public function getDesignationInDropdown(Request $request){
        $dataArray = [];
        try {
            $searchTerm = ''; 
            if(isset($request->searchTerm)) {
                $searchTerm = $request->searchTerm;
            }

            $dataReturned = Designation::where('is_active', constants('is_active.active'))
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
