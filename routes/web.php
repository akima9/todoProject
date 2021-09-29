<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskGroupController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TaskGitController;
use App\Http\Controllers\Auth\LoginController;
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

Route::middleware('auth')->group(function(){
    # tasks
    Route::get('/tasks/calendar', [TaskController::class, 'calendar'])->name('task.calendar');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('task.create')->middleware('verified');
    Route::post('/tasks', [TaskController::class, 'store'])->name('task.store');
    Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('task.show');
    Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('task.edit');
    Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('task.update');
    Route::get('/tasks/{id}/complete', [TaskController::class, 'complete'])->name('task.complete');
    Route::get('/tasks/{id}/completeRollBack', [TaskController::class, 'completeRollBack'])->name('task.completeRollBack');
    Route::get('/tasks/{id}/delete', [TaskController::class, 'delete'])->name('task.delete');

    # taskGroups
    Route::get('/taskGroups', [TaskGroupController::class, 'index'])->name('taskGroup.index');
    Route::get('/taskGroups/create/{option}', [TaskGroupController::class, 'create'])->name('taskGroup.create');
    Route::post('/taskGroups', [TaskGroupController::class, 'store'])->name('taskGroup.store');
    Route::get('/taskGroups/{id}', [TaskGroupController::class, 'show'])->name('taskGroup.show');
    Route::get('/taskGroups/{id}/edit', [TaskGroupController::class, 'edit'])->name('taskGroup.edit');
    Route::get('/taskGroups/{id}/delete', [TaskGroupController::class, 'delete'])->name('taskGroup.delete');
    Route::put('/taskGroups/{id}', [TaskGroupController::class, 'update'])->name('taskGroup.update');

    # users
    Route::post('/users/delete', [UserController::class, 'delete'])->name('user.delete');

    # admin
    Route::middleware('can:isAdmin')->group(function(){
        Route::get('/admin',[AdminController::class, 'index'])->name('admin.index');
        Route::get('/admin/tasks',[AdminController::class, 'taskList'])->name('admin.tasks');
        Route::get('/admin/taskGroups',[AdminController::class, 'taskGroupList'])->name('admin.taskGroups');
        Route::get('/admin/users',[AdminController::class, 'userList'])->name('admin.users');
    });

    # taskGits
    Route::get('/taskGits', [TaskGitController::class, 'index'])->name('taskGit.index');
});

Auth::routes(['verify' => true]);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('login/{provider}', [LoginController::class, 'redirectToProvider'])->name('login.social');
Route::get('login/{provider}/callback', [LoginController::class, 'handleProviderCallback'])->name('login.social.callback');
