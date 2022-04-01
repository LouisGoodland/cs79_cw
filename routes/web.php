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


//account creations
Route::get('/create_account', function () {
    return view('account_creation');
})->name('create.account');
Route::post('/create_account/store', [AccountController::class, 'store'])
->name("store.account");

//account viewing
Route::get('/view/{account}', [AccountController::class, 'show'])
->name("show.account");
Route::get('/view/redirect/{session}', [SessionController::class, 'redirect_to_account'])
->name("session.redirect");

//initial session creation
Route::get('view/{account}/add_session', [SessionController::class, 'create'])
->name("create.session");
Route::post('view/{account}/add_session/store', [SessionController::class, 'store'])
->name("store.session");

//session manipulation
Route::get('view/{session}/edit_session', [SessionController::class, 'create2'])
->name("edit.session");
Route::post('view/{session}/edit_session/store', [SessionController::class, 'store2'])
->name("edit.session.store");
Route::get('/view/{session}/delete', [SessionController::class, 'destroy'])
->name("destroy.session");

//adding and deleting of movements
Route::post('view/{session}/edit_session/add_movement', [SessionController::class, 'store3'])
->name("add.movement");
Route::get('view/{session}/edit_session/delete_movement', [SessionController::class, 'delete_movement'])
->name("delete.movement");

//the setting of force activities:
Route::post('view/{session}/edit_session/set_force_activity', [SessionController::class, 'store4'])
->name("store.force.activity");


//moving order of movements
Route::get('view/{session}/{movement}/down', [SessionController::class, 'move_down'])
->name("move_down");
Route::get('view/{session}/{movement}/up', [SessionController::class, 'move_up'])
->name("move_up");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';
