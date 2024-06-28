<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\AttendeeController;
use Illuminate\Support\Facades\Route;

/* 
    We define the routes in the api file
    provider classes they tell laravel how to behave and what to do
    RouteServiceProvider is in charge for the default config of routing api

*/

Route::middleware('auth:sanctum')->get('/user', function(Request $request){
    return $request->user();
});

Route::apiResource('events', EventController::class);
Route::apiResource('events.attendees', AttendeeController::class)
    ->scoped(['attendee' =>'event']); //scoped means that all the attendee resources are all always part of an event

