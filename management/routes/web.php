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

Auth::routes();

$router->middleware('auth')->group(function () use ($router) {

    $router->get('/accounts', [AccountController::class, 'index'])->name('accounts.index');
    $router->get('/accounts/create', [AccountController::class, 'create'])->name('accounts.create');
    $router->post('/accounts', [AccountController::class, 'store'])->name('accounts.store');
    $router->get('/accounts/{id}', [AccountController::class, 'show'])->name('accounts.show');
    $router->get('/accounts/{id}/edit', [AccountController::class, 'edit'])->name('accounts.edit');
    $router->put('/accounts/{id}', [AccountController::class, 'update'])->name('accounts.update');
    $router->delete('/accounts/{id}', [AccountController::class, 'destroy'])->name('accounts.destroy');

    $router->get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    $router->get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    $router->get('/', [App\Http\Controllers\HomeController::class, 'index']);
});
