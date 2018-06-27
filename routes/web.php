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
Route::get('/aulas', 'Web\AulasController@index');
Route::post('/aulas/agregar','Web\AulasController@store');

Route::get('/aulas/{id}/editar','Web\AulasController@edit');
Route::put('/aulas/{id}/editar','Web\AulasController@update');
Route::get('/aulas/{aula}','Web\AulasController@show');



//Materias
Route::get('/materias', 'Web\MateriasController@index');

Route::get('/materias/agregar', 'Web\MateriasController@create')->name('materias.create');
Route::post('/materias','Web\MateriasController@store');
Route::get('/materias/{id}/editar', 'Web\MateriasController@edit')->name('materias.edit');
Route::put('/materias/{id}/editar','Web\MateriasController@update');

/**
 * Cursadas
 */
Route::get('/cursadas', 'Web\CursadasController@index')->name('cursadas.index');
Route::get('/cursadas/agregar', 'Web\CursadasController@create')->name('cursadas.create');
Route::post('/cursadas','Web\CursadasController@store')->name('cursadas.store');
