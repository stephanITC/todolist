<?php

use App\Http\Controllers\TodoListController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/todo', [TodoListController::class, 'index'])->name('todo');


// controller: php artisan make:controller TodoListController
Route::post('/saveItem', [TodoListController::class, 'saveItem'])->name('saveItem');

Route::post('/markCompleteRoute/{id}', [TodoListController::class, 'markComplete'])->name('markCompleteRoute');
