<?php

use App\Http\Controllers\User52Controller;
use App\Http\Controllers\Agama52Controller;
use App\Http\Controllers\apiclient\Agama52Controller as ClientAgama52Controller;
use App\Http\Controllers\apiclient\User52Controller as ClientUser52Controller;
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

//welcome page
Route::get('/', function () {
    return redirect('/login52');
});

Route::group(['middleware' => ['isNotLogin']], function () {
    // Register Login
    Route::view('/register52', 'register');
    Route::view('/login52', 'login');
    Route::post('/register52', [App\Http\Controllers\Register52Controller::class, 'register52']);
    Route::post('/login52', [App\Http\Controllers\Login52Controller::class, 'login52']);
});

// Role Admin
Route::group(['middleware' => ['isAdmin']], function () {

    // API DATA USER
    Route::get('/dashboard52', [User52Controller::class, 'dashboardPage52']);
    Route::get('/user52/{id}', [User52Controller::class, 'detailPage52']);
    Route::get('/user52/{id}/status', [User52Controller::class, 'putUserStatus52']);
    Route::post('/user52/{id}/agama', [User52Controller::class, 'putUserAgama52']);
    Route::get('/user52/{id}/delete', [User52Controller::class, 'deleteUser52']);

    // API AGAMA
    Route::get("/agama52", [Agama52Controller::class, "agamaPage52"]);
    Route::post("/agama52", [Agama52Controller::class, "createAgama52"]);
    Route::get("/agama52/{id}/edit", [Agama52Controller::class, "editAgamaPage52"]);
    Route::post("/agama52/{id}/update", [Agama52Controller::class, "updateAgama52"]);
    Route::get("/agama52/{id}/delete", [Agama52Controller::class, "deleteAgama52"]);

    // API CLIENT DATA USER
    Route::get("/apiclient/dashboard52", [ClientUser52Controller::class, "dashboardPage52"]);
    Route::get("/apiclient/user52/{id}", [ClientUser52Controller::class, "detailPage52"]);
    Route::get("/apiclient/user52/{id}/status", [ClientUser52Controller::class, "putUserStatus52"]);
    Route::post("/apiclient/user52/{id}/agama", [ClientUser52Controller::class, "putUserAgama52"]);
    Route::get("/apiclient/user52/{id}/delete", [ClientUser52Controller::class, "deleteUser52"]);

    // API CLIENT AGAMA
    Route::get("/apiclient/agama52", [ClientAgama52Controller::class, "agamaPage52"]);
    Route::get("/apiclient/agama52/{id}/edit", [ClientAgama52Controller::class, "editAgamaPage52"]);
    Route::post("/apiclient/agama52", [ClientAgama52Controller::class, "createAgama52"]);
    Route::post("/apiclient/agama52/{id}/update", [ClientAgama52Controller::class, "updateAgama52"]);
    Route::get("/apiclient/agama52/{id}/delete", [ClientAgama52Controller::class, "deleteAgama52"]);


});


// Role User
Route::group(['middleware' => ['isUser']], function () {

    // API User
    Route::view('/changePassword52', 'editPW');
    Route::get('/profile52', [User52Controller::class, 'profilePage52']);
    Route::post('/user52', [User52Controller::class, 'putUserDetail52']);
    Route::post('/user52/photo', [User52Controller::class, 'putUserPhoto52']);
    Route::post('/user52/photoKTP', [User52Controller::class, 'putUserPhotoKTP52']);
    Route::post('/user52/password', [User52Controller::class, 'putUserPassword52']);

    // API Client User
    Route::view('/apiclient/changePassword52', 'editPW', ['Use_API' => true]);
    Route::get('/apiclient/profile52', [ClientUser52Controller::class, 'profilePage52']);
    Route::post('/apiclient/user52', [ClientUser52Controller::class, 'putUserDetail52']);
    Route::post('/apiclient/user52/photo', [ClientUser52Controller::class, 'putUserPhoto52']);
    Route::post('/apiclient/user52/photoKTP', [ClientUser52Controller::class, 'putUserPhotoKTP52']);
    Route::post('/apiclient/user52/password', [ClientUser52Controller::class, 'putUserPassword52']);


});

// Welcome Page
Route::get('/halo52', [App\Http\Controllers\Halo52Controller::class, 'halo52']);

// Logout Session
Route::get('/logout52', [User52Controller::class, 'logout52'])->middleware('isLogin');
