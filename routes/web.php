<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\PerformanceController;

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

Route::get('/question/list', [QuestionController::class, 'list'])->name('questionList');
Route::get('/question/modify/{id?}', [QuestionController::class, 'modify'])->name('questionModify');
Route::post('/question/questionSave', [QuestionController::class, 'save'])->name('questionSave');

Route::get('/performance/list', [PerformanceController::class, 'list'])->name('performanceList');
Route::get('/performance/modify/{id?}', [PerformanceController::class, 'modify'])->name('performanceModify');
Route::post('/performance/Save', [PerformanceController::class, 'save'])->name('performanceSave');


