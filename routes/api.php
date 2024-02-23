<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\AreaConocimientoController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\NrcController;
use App\Http\Controllers\SemestreController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::apiResource("docente", DocenteController::class);
Route::apiResource("area", AreaConocimientoController::class);
Route::apiResource("materia", MateriaController::class);
Route::apiResource("nrc", NrcController::class);
Route::apiResource("semestre", SemestreController::class);
