<?php
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

// Account index - owner

Route::get('/account',[App\Http\Controllers\Account\AccountController::class, 'index'])
    ->name('account')
    ->middleware('acl:Account');

// Registration new sub user - owner

Route::get('/subuser', [App\Http\Controllers\Account\AccountController::class, 'showRegistrationSubUserForm'])
    ->name('subuser')
    ->middleware('acl:Account');

Route::post('/register-subuser', [App\Http\Controllers\Account\AccountController::class, 'createSubUser'])
    ->name('register-subuser')
    ->middleware('acl:Account');


//Places for other user

Route::get('/dashboard',[App\Http\Controllers\Account\AccountController::class, 'dashboard'])
    ->name('dashboard')
    ->middleware('acl:Dashboard');

Route::get('/reports',[App\Http\Controllers\Account\AccountController::class, 'reports'])
    ->name('reports')
    ->middleware('acl:Reports');

Route::get('/configuration',[App\Http\Controllers\Account\AccountController::class, 'configuration'])
    ->name('configuration')
    ->middleware('acl:Configuration');


