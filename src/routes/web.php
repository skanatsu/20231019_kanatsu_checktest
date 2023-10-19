<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpinionController;

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

Route::get('/', [OpinionController::class, 'index']);
Route::get('/confirm', [OpinionController::class, 'confirm']);
Route::get('/thanks', [OpinionController::class, 'thanks']);
Route::get('/manage', [OpinionController::class, 'manage']);
Route::post('/confirm/check', [OpinionController::class, 'check']);
Route::post('/thanks/store', [OpinionController::class, 'store']);
Route::get('/manage/search', [OpinionController::class, 'search']);
Route::delete('/manage/delete', [OpinionController::class, 'destroy']);