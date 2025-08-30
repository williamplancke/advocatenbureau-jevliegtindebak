<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

Route::get('/clients', [Controller::class, 'getClients']);
Route::get('/lawyers', [Controller::class, 'getLawyers']);
Route::post('/appointments', [Controller::class, 'setAppointment']);
