<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
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
