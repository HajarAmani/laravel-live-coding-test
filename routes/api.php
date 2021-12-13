<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\ApiController;
use App\Http\Controllers\EventsController;

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


//Route::get("v1", [EventsController::class, "index"]);

//Route::resource('v1', 'EventsController');
// API routes
Route::group(['prefix' => 'v1'], function()
{
	Route::get('/', [EventsController::class, 'index']);	

	Route::get("events", [ApiController::class, "index"]);
	Route::post("events", [ApiController::class, "create"]);
	Route::get("events/{id}", [ApiController::class, "show"]);
	Route::post("events/{id}", [ApiController::class, "update"]);
	
	Route::get("active_events", [ApiController::class, "active_events"]);
	
	Route::post("add-student", [ApiController::class, "CreateStudent"]);
	Route::put("update-student/{id}", [ApiController::class, "updateStudent"]);
	Route::delete("delete-student/{id}", [ApiController::class, "deleteStudent"]);
});