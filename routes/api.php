<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\Agama52Controller;
use App\Http\Controllers\api\User52Controller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get("/user52", [User52Controller::class, "getUsers52"]);
Route::get("/user52/{id}", [User52Controller::class, "getUserDetail52"]);
Route::put("/user52/{id}", [User52Controller::class, "putUserDetail52"]);
Route::put("/user52/{id}/photo", [User52Controller::class, "putUserPhoto52"]);
Route::put("/user52/{id}/photoKTP", [User52Controller::class, "putUserPhotoKTP52"]);
Route::put("/user52/{id}/password", [User52Controller::class, "putUserPassword52"]);
Route::put("/user52/{id}/status", [User52Controller::class, "putUserStatus52"]);
Route::put("/user52/{id}/agama", [User52Controller::class, "putUserAgama52"]);
Route::delete("/user52/{id}", [User52Controller::class, "deleteUser52"]);

Route::get("/agama52", [Agama52Controller::class, "getAgama52"]);
Route::get("/agama52/{id}", [Agama52Controller::class, "getDetailAgama52"]);
Route::post("/agama52", [Agama52Controller::class, "postAgama52"]);
Route::put("/agama52/{id}", [Agama52Controller::class, "putAgama52"]);
Route::delete("/agama52/{id}", [Agama52Controller::class, "deleteAgama52"]);



