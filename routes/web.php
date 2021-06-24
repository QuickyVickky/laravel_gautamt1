<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\DepartmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::group(array('middleware' => ['checkLogin']), function () {
    Route::prefix(env('ADMINBASE_NAME'))->group(function () {

        Route::get('employee-list', [EmployeeController::class, 'index'])->name('employee-list');
        Route::get('get-employee-data-list', [EmployeeController::class, 'getData'])->name('get-employee-data-list');
        Route::get('get-edit-employee-data', [EmployeeController::class, 'getEdit'])->name('get-edit-employee-data');
        Route::post('add-update-employee', [EmployeeController::class, 'addUpdate'])->name('add-update-employee');
        Route::post('delete-employee', [EmployeeController::class, 'deleteEmployee'])->name('delete-employee');




        Route::post('getDesignationInDropdown', [DesignationController::class, 'getDesignationInDropdown'])->name('getDesignationInDropdown');
        Route::post('getDepartmentInDropdown', [DepartmentController::class, 'getDepartmentInDropdown'])->name('getDepartmentInDropdown');





        Route::get('log-out', [LoginController::class, 'logOut'])->name('log-out');

    });
});



Route::post('/adminside/log-in', [LoginController::class, 'login'])->name('log-in');
Route::get('/adminside/loginpage', [LoginController::class, 'index'])->name('loginpage');
Route::get('/adminside', function () {
    if (Session::has('adminid')) {
        return redirect()->route('employee-list'); 
    } else {
        return redirect()->route('loginpage');
    }
})->name('loginscreen');