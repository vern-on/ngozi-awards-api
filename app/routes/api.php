<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/faq', 'QuestionsController@index');
Route::get('/faq/popular', 'QuestionsController@popular');
Route::get('/faq/categories', 'QuestionsController@categories');
Route::get('/faq/{slug}', 'QuestionsController@get');
Route::get('/faq/{slug}/increment', 'QuestionsController@increment');

Route::get('/partners', 'SponsorsController@partners');

Route::post('/contact', 'ContactsController@store');
