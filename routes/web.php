<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('roles', RoleController::class)->except('show');
Route::resource('departments', DepartmentController::class)->except('show');
Route::resource('employees', EmployeeController::class)->except('show');
