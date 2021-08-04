<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestTaskController;
use App\Http\Controllers\RestUserController;
use App\Models\Task;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tasks/list', [RestTaskController::class, 'list'])->name('restTask.list');
Route::put('/tasks/{id}', [RestTaskController::class, 'update'])->name('restTask.update');

Route::get('/users/userIdDupeChk/{id}', [RestUserController::class, 'userIdDupeChk'])->name('restUser.userIdDupeChk');
