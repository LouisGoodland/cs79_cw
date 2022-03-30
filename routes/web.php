<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\SessionController;
use App\Models\Account;

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
    return view('welcome');
});

Route::get('collect_sessions/{account}', [AccountController::class, 'collect'])
->name("collect.sessions");

Route::get('/view/{account}', [AccountController::class, 'show'])
->name("show.account")->middleware('auth');
Route::get('/view/redirect/{session}', [SessionController::class, 'redirect_to_account'])
->name("session.redirect")->middleware('auth');

Route::get('view/{account}/add_session', [SessionController::class, 'create'])
->name("create.session")->middleware('auth');
Route::post('view/{account}/add_session/store', [SessionController::class, 'store'])
->name("store.session")->middleware('auth');

Route::get('view/{session}/add_session2', [SessionController::class, 'create2'])
->name("create.session2")->middleware('auth');
Route::post('view/{session}/add_session2/store', [SessionController::class, 'store2'])
->name("store.session2")->middleware('auth');

/*
Route::get('/edit/{account}', [AccountController::class, 'edit'])
->name("edit.account")->middleware('auth');

Route::post('/edit/{account}/update', [AccountController::class, 'update'])
->name("update.account")->middleware('auth');
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';
