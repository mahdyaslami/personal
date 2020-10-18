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

$router->get('/accounts', [AccountController::class, 'index']);
$router->get('/accounts/create', [AccountController::class, 'create']);
$router->post('/accounts', [AccountController::class, 'store']);
$router->get('/accounts/{account}', [AccountController::class, 'show']);