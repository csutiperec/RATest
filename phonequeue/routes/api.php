<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\phoneQueueAPI;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/OpenTimesAsList/{TimesArray}", [phoneQueueAPI::class, 'getOpenTimesAsList']);