<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

Route::get('/clients', [Controller::class, 'getClients']);
Route::get('/lawyers', [Controller::class, 'getLawyers']);
Route::get('/appointments', [Controller::class, 'getAppointments']);
Route::get('clients/appointments/{clientId}', [Controller::class, 'getAppointmentByClient']);
Route::get('lawyers/appointments/{lawyerId}', [Controller::class, 'getAppointmentByLawyer']);
Route::post('/appointments', [Controller::class, 'setAppointment']);
Route::delete('/appointments', [Controller::class, 'deleteAllAppointments']);
Route::delete('/appointments/{appointmentId}', [Controller::class, 'deleteAppointment']);
Route::delete('/clients/{clientId}',[Controller::class, 'deleteClient']);
