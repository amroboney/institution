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
    // return view('welcome');
	return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/get_studant','HomeController@get_studant')->name('get_studant'); 

//Types
Route::get('/type/{id}','TypeController@show_section');
Route::post('/add_type','TypeController@add_post');

//Sections
Route::get('/add_section/{type_id}','SectionController@add');
Route::post('/add_section','SectionController@add_post');
Route::get('/edit_section/{section_id}','SectionController@edit');
Route::post('/edit_section','SectionController@edit_post');
Route::get('/active/{section_id}','SectionController@active');

//Studants
Route::get('/show_student/{section_id}','StudantController@show_by_section');
Route::get('/add_studant/{section_id}','StudantController@add');
Route::post('/add_studant','StudantController@add_post');
Route::get('/edit_studant/{studant_id}/{section_id}','StudantController@edit');
Route::get('/remote_section/{type_id}','StudantController@remote_section');
Route::post('/edit_studant','StudantController@edit_post');
Route::get('/delete_student/{studant_id}','StudantController@delete_stu');


// Fnince
Route::get('/fnince/{studant_id}','FninceController@fnince');
Route::post('/fnince','FninceController@add_post');
Route::get('/detials_fnince/{fnince_id}','FninceController@details');