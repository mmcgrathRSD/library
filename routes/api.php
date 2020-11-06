<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\NetsuiteEventController;

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
Route::middleware('logrequest')->match(array('GET','POST'),'event', [NetsuiteEventController::class, 'index']);

Route::middleware('logrequest')->get('test', function(){
    $f = Storage::disk('s3')->files('requests', 'ok');

    $t = Storage::disk('s3')->get($f[0]);

    dd($t);
});