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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

<?php

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::resources([
        'characters' => 'VG\CharacterController',
        'companies' => 'VG\CompanyController',
        '/' => 'VG\GameController',
        'games' => 'VG\GameController',
        'genres' => 'VG\GenreController',
        'platforms' => 'VG\PlatformController',
        'reviews' => 'VG\ReviewController',
        'codes' => 'VG\CodeController',

    ]);
    Route::put('purchase', 'VG\CodeController@purchase')->name('purchase');

});
