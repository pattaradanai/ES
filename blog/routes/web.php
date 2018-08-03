<?php
use App\Article;
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
Route::get('/search', function () {
    return view('template');
});
Route::get('/getindex', function () {
    return view('search');
});




   


Route::get('testes','ClientController@Test');
Route::get('ngram','ClientController@Ngrams')->name('ngram');
Route::get('getngram','ClientController@getNgrams')->name('getngram');
Route::get('setmap','ClientController@importDB')->name('setMapping');
Route::get('add','ClientController@addindex')->name('addindex');
Route::get('getData','ClientController@getData')->name('getData');

Route::post('datasearch','ClientController@search')->name('essearch');

    