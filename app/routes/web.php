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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/faq', 'QuestionsController@index');
Route::get('/faq/popular', 'QuestionsController@popular');
Route::get('/faq/categories', 'QuestionsController@categories');
Route::get('/faq/{slug}', 'QuestionsController@get');
Route::get('/faq/{slug}/increment', 'QuestionsController@increment');
