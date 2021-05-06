<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\LoginController;
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
Route::get('logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

/**
 * EXPENSES
 */

Route::get('/dashboard', [App\Http\Controllers\ExpensesController::class, 'dashboard'])->name('expense.dashboard')->middleware('auth');
Route::post('/deleteExpenses', [App\Http\Controllers\ExpensesController::class, 'delete'])->name('expense.delete')->middleware('auth');
Route::post('/editExpenses', [App\Http\Controllers\ExpensesController::class, 'edit'])->name('expense.edit')->middleware('auth');
Route::get('/expenses', [App\Http\Controllers\ExpensesController::class, 'show'])->name('expense.show')->middleware('auth');
Route::post('/saveExpenses', [App\Http\Controllers\ExpensesController::class, 'save'])->name('expense.save')->middleware('auth');
/**
 * CATEGORY
 */


Route::get('/showCategory', [App\Http\Controllers\CategoryController::class, 'show'])->name('category.show')->middleware('auth');
Route::post('/saveCategory', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create')->middleware('auth');
Route::post('/deleteCategory', [App\Http\Controllers\CategoryController::class, 'delete'])->name('category.delete')->middleware('auth');
Route::post('/editCategory', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit')->middleware('auth');
/**
 * USER
 */
Route::post('/deleteUser', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete')->middleware('auth');
Route::get('/showUsers', [App\Http\Controllers\UserController::class, 'show'])->name('user.show')->middleware('auth');
Route::post('/saveUser', [App\Http\Controllers\UserController::class, 'create'])->name('user.create')->middleware('auth');
Route::post('/editUser', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit')->middleware('auth');

/**
 * ROUTER FOR ROLES
 */

Route::post('/updatePassword', [App\Http\Controllers\RoleController::class, 'change'])->name('role.change')->middleware('auth');

Route::post('/delete', [App\Http\Controllers\RoleController::class, 'delete'])->name('role.delete')->middleware('auth');
Route::post('/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('role.edit')->middleware('auth');
Route::get('/show', [App\Http\Controllers\RoleController::class, 'show'])->name('role.show')->middleware('auth');
Route::get('/index', [App\Http\Controllers\RoleController::class, 'index'])->name('index')->middleware('auth');
Route::post('/index', [App\Http\Controllers\RoleController::class, 'create'])->name('role.create')->middleware('auth');

Route::get('/roles', [App\Http\Controllers\RoleController::class, 'showRoles'])->name('role.roles')->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
