<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskGroupController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

/*
Verb	        URI	                    Action	    Route Name
GET	            /photos	                index	    photos.index
GET	            /photos/create	        create	    photos.create
POST	        /photos	                store	    photos.store
GET	            /photos/{photo}	        show	    photos.show
GET	            /photos/{photo}/edit	edit	    photos.edit
PUT/PATCH	    /photos/{photo}	        update	    photos.update
*/

Route::get('/', [TaskController::class, 'index'])->name('task.index');
Route::get('/tasks/calendar', [TaskController::class, 'calendar'])->name('task.calendar');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('task.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('task.store');
Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('task.show');
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('task.edit');
Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('task.update');
Route::get('/tasks/{id}/delete', [TaskController::class, 'delete'])->name('task.delete');


Route::get('/taskGroups', [TaskGroupController::class, 'index'])->name('taskGroup.index');
Route::get('/taskGroups/create', [TaskGroupController::class, 'create'])->name('taskGroup.create');
Route::post('/taskGroups', [TaskGroupController::class, 'store'])->name('taskGroup.store');
Route::get('/taskGroups/{id}', [TaskGroupController::class, 'show'])->name('taskGroup.show');
Route::get('/taskGroups/{id}/edit', [TaskGroupController::class, 'edit'])->name('taskGroup.edit');
Route::get('/taskGroups/{id}/delete', [TaskGroupController::class, 'delete'])->name('taskGroup.delete');
Route::put('/taskGroups/{id}', [TaskGroupController::class, 'update'])->name('taskGroup.update');


Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
Route::post('/users', [UserController::class, 'store'])->name('user.store');
Route::get('/users/loginView', [UserController::class, 'loginView'])->name('user.loginView');
Route::post('/users/login', [UserController::class, 'login'])->name('user.login');
Route::get('/users/logout', [UserController::class, 'logout'])->name('user.logout');


// Route::get('/taskGroups', [TaskGroupController::class, 'index'])->name('taskGroup.index');
// Route::get('/taskGroups/{id}', [TaskGroupController::class, 'show'])->name('taskGroup.show');
// Route::get('/taskGroups/{id}/edit', [TaskGroupController::class, 'edit'])->name('taskGroup.edit');
// Route::get('/taskGroups/{id}/delete', [TaskGroupController::class, 'delete'])->name('taskGroup.delete');
// Route::put('/taskGroups/{id}', [TaskGroupController::class, 'update'])->name('taskGroup.update');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
