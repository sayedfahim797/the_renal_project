<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes(['verify' => true]);

Route::group(['middleware'=>'admin'],function () {
	Route::get('/admin', 'Backend\Admin\HomeController@index')->name('admin');

	//Password Change Route ARE HERE...
	Route::get('/admin/change/password', 'Backend\Admin\ChangePasswordController@index')->name('adminPasswordChange');
	Route::post('/admin/update/password', 'Backend\Admin\ChangePasswordController@update')->name('adminPasswordUpdate');
	Route::get('/admin/profile', 'Backend\Admin\OtherController@index')->name('adminProfile');

	//Manage Admins Route ARE HERE...
	Route::prefix('admins')->group(function(){
		Route::get('/view', 'Backend\Admin\AdminController@index')->name('viewAdmins');
		Route::get('/create', 'Backend\Admin\AdminController@create')->name('createAdmins');
		Route::post('/store', 'Backend\Admin\AdminController@store')->name('storeAdmins');
	// For EDIT 
		Route::get('/edit/{id}', 'Backend\Admin\AdminController@edit')->name('editAdmins');
		Route::post('/update/{id}', 'Backend\Admin\AdminController@update')->name('updateAdmins');
		Route::get('/delete/{id}', 'Backend\Admin\AdminController@destroy')->name('deleteAdmins');
	});

	//Manage Doctors Route ARE HERE...
	Route::prefix('doctors')->group(function(){
		Route::get('/view', 'Backend\Admin\DoctorController@index')->name('viewDoctors');
		Route::get('/create', 'Backend\Admin\DoctorController@create')->name('createDoctors');
		Route::post('/store', 'Backend\Admin\DoctorController@store')->name('storeDoctors');
	// For EDIT 
		Route::get('/edit/{id}', 'Backend\Admin\DoctorController@edit')->name('editDoctors');
		Route::post('/update/{id}', 'Backend\Admin\DoctorController@update')->name('updateDoctors');
		Route::get('/delete/{id}', 'Backend\Admin\DoctorController@destroy')->name('deleteDoctors');
	});

	//Manage Doctors Route ARE HERE...
	Route::prefix('staffs')->group(function(){
		Route::get('/view', 'Backend\Admin\StaffController@index')->name('viewStaffs');
		Route::get('/create', 'Backend\Admin\StaffController@create')->name('createStaffs');
		Route::post('/store', 'Backend\Admin\StaffController@store')->name('storeStaffs');
	// For EDIT 
		Route::get('/edit/{id}', 'Backend\Admin\StaffController@edit')->name('editStaffs');
		Route::post('/update/{id}', 'Backend\Admin\StaffController@update')->name('updateStaffs');
		Route::get('/delete/{id}', 'Backend\Admin\StaffController@destroy')->name('deleteStaffs');
	});

	//Manage Branches Route ARE HERE...
	Route::prefix('branches')->group(function(){
		Route::get('/view', 'Backend\Admin\BranchController@index')->name('viewBranches');
		Route::get('/create', 'Backend\Admin\BranchController@create')->name('createBranches');
		Route::post('/store', 'Backend\Admin\BranchController@store')->name('storeBranches');
	// For EDIT 
		Route::get('/edit/{id}', 'Backend\Admin\BranchController@edit')->name('editBranches');
		Route::post('/update/{id}', 'Backend\Admin\BranchController@update')->name('updateBranches');
		Route::get('/delete/{id}', 'Backend\Admin\BranchController@destroy')->name('deleteBranches');
	});
});

Route::group(['middleware'=>'doctor'],function () {
	Route::get('/doctor', 'Backend\Doctor\HomeController@index')->name('doctor');

	//Password Change Route ARE HERE...
	Route::get('doctor/change/password', 'Backend\Doctor\ChangePasswordController@index')->name('doctorPasswordChange');
	Route::post('doctor/update/password', 'Backend\Doctor\ChangePasswordController@update')->name('doctorPasswordUpdate');
	Route::get('/doctor/profile', 'Backend\Doctor\OtherController@index')->name('doctorProfile');
});

Route::group(['middleware'=>'staff'],function () {
	Route::get('/staff', 'Backend\Staff\HomeController@index')->name('staff');

	//Password Change Route ARE HERE...
	Route::get('staff/change/password', 'Backend\Staff\ChangePasswordController@index')->name('staffPasswordChange');
	Route::post('staff/update/password', 'Backend\Staff\ChangePasswordController@update')->name('staffPasswordUpdate');
	Route::get('/staff/profile', 'Backend\Staff\OtherController@index')->name('staffProfile');

	//Manage Doctors Route ARE HERE...
	Route::prefix('patients')->group(function(){
		Route::get('/view', 'Backend\Staff\PatientController@index')->name('viewPatients');
		Route::get('/create', 'Backend\Staff\PatientController@create')->name('createPatients');
		Route::post('/store', 'Backend\Staff\PatientController@store')->name('storePatients');
	// For EDIT 
		Route::get('/edit/{id}', 'Backend\Staff\PatientController@edit')->name('editPatients');
		Route::post('/update/{id}', 'Backend\Staff\PatientController@update')->name('updatePatients');
		Route::get('/delete/{id}', 'Backend\Staff\PatientController@destroy')->name('deletePatients');
	});
});