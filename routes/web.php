<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventsController;


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

//Route::get('/', function () {
//    return view('phpiv');
//}

//Route::get('/', [UserController::class, 'show']);
//Route::group(array('before' => 'auth'), function() {
Route::get('/', [EventsController::class, 'index']);	
Route::get("events/{id}/update", [EventsController::class, "edit"]);
Route::get("events/{id}", [EventsController::class, "show"]);
Route::get("events/create", [EventsController::class, "create"]);
Route::post("events/update", [EventsController::class, "update"]);
Route::post("events/store", [EventsController::class, "store"]);
Route::post("events/delete/{id}", [EventsController::class, "destroy"]);

//Route::resource('events','EventsController');

//Route::post('events', 'find', ['id' => 'id']);
//Route::get('find', [EventsController::class, 'index']);	

//Route::get('/find/{id}', function ($id) {
   // return 'find'.$id;
//});
//);
