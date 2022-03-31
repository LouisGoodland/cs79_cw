<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\SessionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('collect_sessions/{account}', [AccountController::class, 'collect'])
->name("collect.sessions");

Route::get('set_session_status/complete/{session}', [SessionController::class, 'update_status_complete'])
->name("update.session.status.complete");
Route::get('set_session_status/doing/{session}', [SessionController::class, 'update_status_doing'])
->name("update.session.status.doing");


//add post api
