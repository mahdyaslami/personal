<?php

use App\Http\Controllers\AccountController;

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

$router->get('/management/accounts', [AccountController::class, 'index'])->name('accounts.index');
$router->get('/management/accounts/create', [AccountController::class, 'create'])->name('accounts.create');
$router->post('/management/accounts', [AccountController::class, 'store'])->name('accounts.store');
$router->get('/management/accounts/{id}', [AccountController::class, 'show'])->name('accounts.show');
$router->get('/management/accounts/{id}/edit', [AccountController::class, 'edit'])->name('accounts.edit');
$router->put('/management/accounts/{id}', [AccountController::class, 'update'])->name('accounts.update');
$router->delete('/management/accounts/{id}', [AccountController::class, 'destroy'])->name('accounts.destroy');

Auth::routes();

$router->get('/management/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
