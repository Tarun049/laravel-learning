<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Learning;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Membercontroller;


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

Route::get('/custom-register/{id}', [UserController::class, 'testing'] )->name('custom_route');;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// route for learning purpose
Route::get("learning", [Learning::class, "loadView"]);

// routes for learning middleware
Route::view("/group/noaccess", "noaccess");
// Route::view("/group/check-user", "check")->middleware("checkHeight");

Route::middleware(['checkAge', 'checkHeight'])->group(function () { 
    Route::view("/group/users", "users");
});

// route to connect db using class
Route::get("/class/connection", [UserController::class, "setDbUsingClass"]);

// route to connect db using class
Route::get("/model/connection", [UserController::class, "setDbUsingModel"]);

// route to use external api requests
Route::get("/api/html", [UserController::class, "getExternalApi"]);

// route to use external api requests
Route::get("/api/html", [UserController::class, "getExternalApi"]);


// route for request http methods
Route::post("request/form", [UserController::class, "testRequest"]);

// Route::view("userProfile", 'userProfile');
// Route::view("login/request", 'userForm');
Route::get('login/request', function () {
    if( session()->has('user_email') ){
        return redirect('userProfile');
    }
    return view('userForm');
});
Route::get('userProfile', function () {
    if( session()->has('user_email') ){
        return view('userProfile');
    }
    return redirect('login/request');
});

Route::get('/user/logout', function () {
    if( session()->has('user_email') ){
        session()->pull('user_email', null); 
    }
    return redirect('/login/request');
});

// // route for html forms
// Route::post("user-form", [FormController::class, "get_data"]);
// Route::view("user-form", 'userForm');


Route::view('/flashSession', 'flashSession');
Route::post('/flash/session',[UserController::class, "flash_session"])->name("flashSession");

//routes to show list using model
Route::get("/user/member-list", [Membercontroller::class, "showList"]);

//route to delete the users
Route::get("/delete/member-user/{user_id}", [Membercontroller::class, "deleteListUser"]);

//route to update the users
Route::get("/update/member-user/{user_id}", [Membercontroller::class, "getUpdateListUser"]);


//route to update the users
Route::post("update/member-user", [Membercontroller::class, "UpdateListUser"]);

//route to learn query builder
Route::get("/query-builder", [Membercontroller::class, "queryBuilder"]);

require __DIR__ . '/auth.php';