<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardContoller;
use App\Http\Controllers\EmployeeController;
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
Auth::routes(["register" => false]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(["midddleware" => "auth"], function () {
    Route::get('/dashboard', [DashboardContoller::class, "dashboard"])->name("dashboard");
    Route::resource('companies', CompanyController::class);
    Route::resource('employees', EmployeeController::class);
});



