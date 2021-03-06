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

Route::get('/', function () {
    return view('welcome');
});

//Aulas
Route::get('/aulas/agregar', 'Web\AulasController@create')->name('aulas.create');
Route::get('/aulas', 'Web\AulasController@index')->name('aulas.index');
Route::post('/aulas/agregar','Web\AulasController@store')->name('aulas.store');
Route::get('/aulas/{id}/editar','Web\AulasController@edit')->name('aulas.edit');
Route::put('/aulas/{id}/editar','Web\AulasController@update')->name('aulas.update');
Route::get('/aulas/{aula}','Web\AulasController@show')->name('aulas.show');
Route::delete('/aulas/{id}','Web\AulasController@destroy')->name('aulas.delete');

//Materias
Route::get('/materias', 'Web\MateriasController@index')->name('materias.index');
Route::get('/materias/agregar', 'Web\MateriasController@create')->name('materias.create');
Route::post('/materias','Web\MateriasController@store');
Route::get('/materias/{id}/editar', 'Web\MateriasController@edit')->name('materias.edit');
Route::put('/materias/{id}/editar','Web\MateriasController@update');
Route::delete('/materias/{id}','Web\MateriasController@destroy')->name('materias.delete');

// Cursadas
Route::get('/cursadas', 'Web\CursadasController@index')->name('cursadas.index');
Route::get('/cursadas/agregar', 'Web\CursadasController@create')->name('cursadas.create');
Route::post('/cursadas','Web\CursadasController@store')->name('cursadas.store');
Route::delete('/cursadas/{id}','Web\CursadasController@destroy')->name('cursadas.delete');
Route::get('/cursadas/{cursada}/editar', 'Web\CursadasController@edit')->name('cursadas.edit');
Route::put('/cursadas/{id}/editar','Web\CursadasController@update');

