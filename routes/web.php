<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use App\Models\User;
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

// Auth
Route::get('/register', [UserController::class, 'register'])->name('registration')->middleware('guest');
Route::post('/register', [UserController::class, 'store'])->name('register.store');

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'loginPost'])->name('login.post');
Route::post('/logout', [UserController::class, 'logout'])->name('logoutUser');

// Todos

Route::middleware('auth')->group(function () {
    Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');
    Route::post('/todos', [TodoController::class, 'addTodo'])->name('store.todo');
    Route::delete('/todos/{todo}/destroy', [TodoController::class, 'destroy'])->name('todos.delete');
    Route::put('/todos/{todo}/update', [TodoController::class, 'update'])->name('todos.update');
    Route::post('/todos/{todo}/toggle', [TodoController::class, 'toggle'])->name('todos.toggle');
});
