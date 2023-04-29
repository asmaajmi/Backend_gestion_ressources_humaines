<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\HeureSuppAEffectuerController;

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
Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function(){
	Route::get('user',[AuthController::class,'user']);
	Route::post('logout',[AuthController::class,'logout']);

});
Route::post('createEmploye',[EmployeController::class,'createEmploye']);
Route::get('getAllEmployes',[EmployeController::class,'getAllEmployes']);
Route::get('getEmployeById/{id}',[EmployeController::class,'getEmployeById']);
Route::delete('deleteEmploye/{employe}',[EmployeController::class,'deleteEmploye']);
Route::put('updateEmp/{employe}',[EmployeController::class,'updateEmploye']);


Route::post('CreateHeuresSupp',[HeureSuppAEffectuerController::class,'CreateHeuresSupp']);
Route::get('AllHeuresSupp',[HeureSuppAEffectuerController::class,'AllHeuresSupp']);
Route::put('editValidation/{val}',[HeureSuppAEffectuerController::class,'editValidation']);
Route::post('updateHeureSupp/{heuresupp}',[HeureSuppAEffectuerController::class,'updateHeureSupp']);
Route::delete('destroyHeureSupp/{heuresupp}',[HeureSuppAEffectuerController::class,'destroyHeureSupp']);
Route::get('getHeureById/{id}',[HeureSuppAEffectuerController::class,'getHeureSuppById']);
Route::get('getEmployeFromHeureSupp/{heuresuppid}',[HeureSuppAEffectuerController::class,'getEmployeFromHeureSupplementaire']);
