<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\AttendeeController;
use App\Http\Controllers\api\UserController;
use Illuminate\Support\Facades\Route;

/*
    We define the routes in the api file
    provider classes they tell laravel how to behave and what to do
    RouteServiceProvider is in charge for the default config of routing api
*/

Route::middleware('auth:sanctum')->get('/user', function(Request $request) {
    return $request->user();
});

// Event routes
Route::apiResource('events', EventController::class);

// Attendee routes, nested under events
Route::apiResource('events.attendees', AttendeeController::class)
    ->scoped(['attendee' => 'event']); // This makes sure attendees are always part of an event

// Return user by ID
Route::get('/user/{id}', [UserController::class, 'show']);

// Update user by ID
Route::put('/user/{id}', [UserController::class, 'update']);

// Create user
Route::post('/user', [UserController::class, 'store']);

// Delete user by ID
Route::delete('/user/{id}', [UserController::class, 'destroy']);
