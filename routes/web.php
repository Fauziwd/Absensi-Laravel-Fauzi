<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\PresencesController;
// use App\Http\Controllers\Auth;
// use App\Http\Controllers\Controller;

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

// Route::get('/', [controller::class, 'index'])->name('welcome');

Route::get('/', function () {
    return view('welcome');
});

// Route Resources
// route::resource('/students', \App\Http\Controllers\StudentsController::class);

Route::get('/', [HomeController::class, 'index']);

Route::post('login', ['as' => 'login', 'uses' => 'LoginController@login']);
Route::middleware(['auth'])->group(function () {
    Route::resource('students', StudentController::class);
    Route::resource('posts', PostController::class);
    Route::resource('groups', GroupController::class);
    Route::get('/groups/{id}', [App\Http\Controllers\GroupController::class, 'show'])->name('show');
    Route::resource('members', MemberController::class);
});

// Route::resource('/posts', \App\Http\Controllers\PostController::class);
// Route::resource('/students', \App\Http\Controllers\StudentController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('schedules', SchedulesController::class);
Route::resource('presences', PresencesController::class);