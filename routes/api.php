<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/info', [PlayerController::class, 'info']);

Route::get('/players', [PlayerController::class, 'index']); // GET request to fetch items
Route::post('/player', [PlayerController::class, 'store']); // POST request to create an item
Route::get('/player/{id}', [PlayerController::class, 'show']); // GET request to fetch a specific item
Route::put('/player/{id}', [PlayerController::class, 'update']); // PUT request to update an item
Route::delete('/player/{id}', [PlayerController::class, 'destroy']); // DELETE request to delete an item


