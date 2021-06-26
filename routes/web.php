<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersImportController;
use App\Http\Controllers\Ledger;

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

Route::get('/', function () {
    return view('start.index');
});

Route::get('/users/export', 'UsersExportController@export');

Route::get('/import', [UsersImportController::class, 'show'])->name('simport');
Route::post('/users/import', [UsersImportController::class, 'store']);
Route::get('/parties',[Ledger::class, 'index'])->name('parties');
Route::get('/single/{id}',[Ledger::class, 'show'])->name('single');
