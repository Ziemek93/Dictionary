<?php

use Illuminate\Support\Facades\Route;;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\DefinitionController;
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


// index page with all word&def
Route::get('/',  [WordController::class, 'index']);

// word and definition edit
Route::put('/listing/edit/{id}', [WordController::class, 'update'])->middleware('auth');

// word and definition edit page
Route::get('/listing/edit/{word}', [WordController::class, 'edit'])->middleware('auth');

// word and definition add page
Route::get('/listing/add',  [WordController::class, 'create'])->middleware('auth');

// word and definition adding
Route::post('/listing/add',  [WordController::class, 'store'])->middleware('auth');

// remove word
Route::delete('/listing/delete/{word}', [WordController::class, 'destroy'])->middleware('auth');

//adding words to definition
Route::post('/word/add/{definition}',  [DefinitionController::class, 'store'])->middleware('auth');

//single definition page
Route::get('/word/add/{definition}',  [DefinitionController::class, 'create'])->middleware('auth');

// remove definition with words
Route::delete('/definition/delete/{definition}', [DefinitionController::class, 'destroy'])->middleware('auth');

// register page
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// register
Route::post('/users', [UserController::class, 'store']);
// logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// login user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
// ->name('login') - middleware/authenticate.php, getting redirect to login page except missing error
