<?php

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

Route::get('/',"HomeController@index");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// user route
Route::get('/user', "UserController@index");
Route::get('/user/profile', "UserController@load_profile");
Route::get('/user/reset-password', "UserController@reset_password");
Route::post('/user/change-password', "UserController@change_password");
Route::get('/user/finish', "UserController@finish_page");
Route::post('/user/update-profile', "UserController@update_profile");
Route::get('/user/delete/{id}', "UserController@delete");
Route::get('/user/create', "UserController@create");
Route::post('/user/save', "UserController@save");
Route::get('/user/edit/{id}', "UserController@edit");
Route::post('/user/update', "UserController@update");
Route::get('/user/update-password/{id}', "UserController@load_password");
Route::post('/user/save-password', "UserController@update_password");
Route::get('/user/branch/{id}', "UserController@branch");
Route::post('/user/branch/save', "UserController@add_branch");
Route::get('/user/branch/delete/{id}', "UserController@delete_branch");
// role
Route::get('/role', "RoleController@index");
Route::get('/role/create', "RoleController@create");
Route::post('/role/save', "RoleController@save");
Route::get('/role/delete/{id}', "RoleController@delete");
Route::get('/role/edit/{id}', "RoleController@edit");
Route::post('/role/update', "RoleController@update");
Route::get('/role/permission/{id}', "PermissionController@index");
Route::post('/rolepermission/save', "PermissionController@save");
// branch
Route::get('/branch', "BranchController@index");
Route::get('/branch/create', "BranchController@create");
Route::post('/branch/save', "BranchController@save");
Route::get('/branch/delete/{id}', "BranchController@delete");
Route::get('/branch/edit/{id}', "BranchController@edit");
Route::post('/branch/update', "BranchController@update");
// class or level of study
Route::get('/class', "ClassController@index");
Route::get('/class/create', "ClassController@create");
Route::get('/class/edit/{id}', "ClassController@edit");
Route::post('/class/save', "ClassController@save");
Route::get('/class/delete/{id}', "ClassController@delete");
Route::post('/class/update', "ClassController@update");
// departments
Route::get('/department', "DepartmentController@index");
Route::get('/department/create', "DepartmentController@create");
Route::get('/department/edit/{id}', "DepartmentController@edit");
Route::get('/department/delete/{id}', "DepartmentController@delete");
Route::post("/department/save", "DepartmentController@save");
Route::post('/department/update', "DepartmentController@update");
// room
Route::get('/room', "RoomController@index");
Route::get('/room/create', "RoomController@create");
Route::get('/room/edit/{id}', "RoomController@edit");
Route::get('/room/delete/{id}', "RoomController@delete");
Route::post('/room/save', "RoomController@save");
Route::post('/room/update', "RoomController@update");
// unit
Route::get('/unit', "UnitController@index");
Route::get('/unit/create', "UnitController@create");
Route::get('/unit/edit/{id}', "UnitController@edit");
Route::get('/unit/delete/{id}', "UnitController@delete");
Route::post('/unit/save', "UnitController@save");
Route::post('/unit/update', "UnitController@update");
// Khmer
Route::get('/khmer', "KhmerController@index");
Route::get('/thai', "KhmerController@thai");
Route::get('/vn', "KhmerController@vn");
Route::post('/khmer/savekh', "KhmerController@savekh");
// customer
Route::get('/customer', "CustomerController@index");
Route::get('/customer/create', "CustomerController@create");
Route::get('/customer/delete/{id}', "CustomerController@delete");
Route::get('/customer/edit/{id}', "CustomerController@edit");
Route::post('/customer/save', "CustomerController@save");
Route::post('/customer/update', "CustomerController@update");
Route::get('/customer/find', "CustomerController@find");
// position
Route::get('/position', "PositionController@index");
Route::get('/position/create', "PositionController@create");
Route::get('/position/edit/{id}', "PositionController@edit");
Route::get('/position/delete/{id}', "PositionController@delete");
Route::post('/position/save', "PositionController@save");
Route::post('/position/update', "PositionController@update");
Route::get('/position/find', "PositionController@find");
// Reports
Route::get('/reports', "ReportsController@index");
Route::get('/winreports', "ReportsController@winreports");
Route::get('/rereports', "ReportsController@rereports");
Route::get('/reports/find', "ReportsController@find");
Route::get('/reports/finduser', "ReportsController@finduser");
Route::get('/reports/findboss', "ReportsController@findboss");
Route::get('/reports/findseller', "ReportsController@findseller");
// Result
Route::get('/result', "ResultController@index");
Route::get('/result/bind', "ResultController@bind");
Route::get('/result/create', "ResultController@create");
Route::post('/result/save', "ResultController@save");
// employees
Route::get('/employee', "EmployeeController@index");
Route::get('/employee/create',"EmployeeController@create");
Route::get('/employee/edit/{id}',"EmployeeController@edit");
Route::get('/employee/delete/{id}',"EmployeeController@delete");
Route::post('/employee/save',"EmployeeController@save");
Route::post('/employee/update',"EmployeeController@update");
Route::get('/empreport', "EmpreportController@index");
Route::get('/empreport/profile/{id}',"EmpreportController@profile");
Route::get('/empreport/list',"EmpreportController@listreport");
Route::get('/employee/find',"EmployeeController@find");
// offices
Route::get('/office', "OfficeController@index");
Route::get('/office/find', "OfficeController@find");
Route::get('/office/create',"OfficeController@create");
Route::get('/office/edit/{id}',"OfficeController@edit");
Route::get('/office/delete/{id}',"OfficeController@delete");
Route::post('/office/saveadd',"OfficeController@saveadd");
Route::post('/office/updateadd',"OfficeController@updateadd");
// leaves
Route::get('/leave', "LeaveController@index");
Route::get('/levreport', "LevreportController@index");
Route::get('/leave/create',"LeaveController@create");
Route::get('/leave/edit/{id}',"LeaveController@edit");
Route::get('/leave/reject/{id}',"LeaveController@reject");
Route::post('/leave/save',"LeaveController@save");
Route::post('/leave/update',"LeaveController@update");
Route::get('/leave/approve/{id}',"LeaveController@approve");
Route::get('/leave/findemp', "LeaveController@findemp");
Route::get('/leave/find', "LeaveController@find");
Route::get('/levreport/indreport/{id}', "LevreportController@indreport");
Route::get('/levreport/list', "LevreportController@listreport");
// leavetype
Route::get('/leavetype', "LeaveTypeController@index");
Route::get('/leavetype/create', "LeaveTypeController@create");
Route::get('/leavetype/edit/{id}', "LeaveTypeController@edit");
Route::get('/leavetype/delete/{id}', "LeaveTypeController@delete");
Route::post('/leavetype/save', "LeaveTypeController@save");
Route::post('/leavetype/update', "LeaveTypeController@update");
// tams
Route::get('/tams', "TamsController@index");
Route::get('/tams/create', "TamsController@create");
Route::get('/tams/indreport/{id}', "TamsController@indreport");
Route::get('/tams/list', "TamsController@listtams");
Route::get('/tams/edit/{id}', "TamsController@edit");
Route::get('/tams/delete/{id}', "TamsController@delete");
Route::post('/tams/save', "TamsController@save");
Route::post('/tams/update', "TamsController@update");
Route::get('/tams/approval', "TamsController@approval");
Route::get('/tams/viewapp/{id}', "TamsController@viewapp");
Route::get('/tams/listapp', "TamsController@listapp");
Route::get('/tams/indapp/{id}', "TamsController@indapp");
Route::get('/tams/timeapprove/{id}', "TamsController@timeapprove");
Route::get('/tams/timereject/{id}', "TamsController@timereject");
Route::post('/tams/posting', "TamsController@posting");
Route::get('/tams/find', "TamsController@find");
// shift
Route::get('/shift', "ShiftController@index");
Route::get('/shift/create', "ShiftController@create");
Route::get('/shift/edit/{id}', "ShiftController@edit");
Route::get('/shift/delete/{id}', "ShiftController@delete");
Route::post('/shift/save', "ShiftController@save");
Route::post('/shift/update', "ShiftController@update");
// accesslog
Route::get('/accesslog', "AccesslogController@index");

//Test
Route::get('/test', "TestController@index");
