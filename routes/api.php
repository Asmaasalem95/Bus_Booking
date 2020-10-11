<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SeatController;
use App\Http\Controllers\Api\TicketController;
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


Route::post('/login',[\App\Http\Controllers\Auth\JwtAuthController::class,'login']);
Route::post('/available_seats',[SeatController::class,'getAvailableSeats']);
Route::middleware(['jwt.verify','auth:api'])->group(function () {
    Route::post('/book_ticket', [TicketController::class, 'bookTicket']);
    });
