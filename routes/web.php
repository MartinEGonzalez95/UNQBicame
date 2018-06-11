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

Route::get('/aulas/agregar', 'Web\AulasController@create')->name('aulas.create');
Route::get('/aulas', 'Web\AulasController@index');
Route::post('/aulas/agregar','Web\AulasController@store');


Route::get('/materias', 'Web\MateriaController@index');

