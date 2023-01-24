<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstBasicApi;
use App\Http\Controllers\ResourceController;

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

// first api to get started
Route::get('basic-one', [FirstBasicApi::class, 'fristBasicApi']);
Route::get('member-list', [FirstBasicApi::class, 'membersList']);

// api with paramater
Route::get('param-api/{id?}', [FirstBasicApi::class, 'firstParamApi']);

//first post api
Route::post('add-post-data', [FirstBasicApi::class, 'firstPostApi']);

//first put api
Route::put('update-post-data', [FirstBasicApi::class, 'firstPutApi']);

//first delete api
Route::delete('delete-user-data/{user_id?}', [FirstBasicApi::class, 'firstDeleteApi']);

Route::apiResource('resource', ResourceController::class);