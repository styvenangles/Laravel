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

Route::get('users', function () {
	return view('users');
});

Route::get('recherche', function () {
	return view('bien/recherche');
});

Route::get('table', function () {
	return view('bien/table');
});

Route::get('user/id', function () {
	return view('user');
});

Auth::routes();

Route::get('/home', 'HomeController@index', function () {
  return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('skillsuser', 'Skilluserchange');

Route::post('bien/updatebien/{id_bien}/create/{id_user}', [
'as' => 'updatebien', 'uses' => 'UpdateBienController@create']);
Route::resource('updatebien', 'UpdateBienController');

Route::resource('usercontroller', 'UserController');


Route::get('biencontroller/search', 'BienController@search');
Route::resource('biencontroller', 'BienController');

Route::middleware('admin')->group(function () {     
    Route::resource('admin', 'AdminController');
    Route::resource('skills', 'SkillController');
    Route::resource('agencecontroller', 'AgenceController');
    Route::resource('ranksuser', 'Ranksuser');
}
);