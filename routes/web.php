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
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Route Hooks - Do not delete//
	Route::view('cursos', 'livewire.cursos.index')->middleware('auth');
	Route::view('docentesmaterias', 'livewire.docentesmaterias.index')->middleware('auth');
	Route::view('materias', 'livewire.materias.index')->middleware('auth');
	Route::view('docentes', 'livewire.docentes.index')->middleware('auth');
	Route::view('areasconocimientos', 'livewire.areasconocimientos.index')->middleware('auth');
	Route::view('curriculums', 'livewire.curriculums.index')->middleware('auth');
	Route::view('semestres', 'livewire.semestres.index')->middleware('auth');
	Route::view('carreras', 'livewire.carreras.index')->middleware('auth');
	Route::view('users', 'livewire.users.index')->middleware('auth');
	Route::view('privilegios', 'livewire.privilegios.index')->middleware('auth');

