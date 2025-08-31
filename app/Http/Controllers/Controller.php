<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
class Controller
{
    function getClients() {
        return DB::table('clients')->get();
    }
    function getLawyers() {
        return DB::table('lawyers')->get();
    }
    function getAppointments(){
        return DB::table('appointments')->get();
    }
    function getAppointmentByClient(string $clientId){
        return DB::table('appointments')->where(['clientId' => $clientId])->get();
    }
    function getAppointmentByLawyer(string $lawyerId){
        return DB::table('appointments')->where('lawyerId', '=', $lawyerId)->get();
    }
    function setAppointment(Request $request) {
        $validator = Validator::make($request->all(), $this->getAppointmentRules());
        if ($validator->fails()) {
            return response()-> json(['errors' => $validator->errors()],
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $appointment = new Appointment();
        $appointment->datetime = $validator->validated()['datetime'];
        $appointment->purpose = $validator->validated()['purpose'];
        $appointment->lawyerId = $validator->validated()['lawyer']['id'];
        $appointment->clientId = $validator->validated()['client']['id'];
        $appointment->save();
        $message = 'De afspraak is vastgelegd';
        return json_encode($message);
    }
    function getClientRules(){
        return [
            'firstname' => 'required|string|min:2|max:255',
            'lastname' => 'required|string|min:2|max:255',
            'email' => 'email:rfc',
            'phone' => 'integer'
            
        ];
    }
    function getAppointmentRules() {
        return [
            'lawyer.id' => 'required|exists:lawyers,id',
            'client.id' => 'required|exists:clients,id',
            'purpose' => 'required|string|max:255',
            'datetime' => 'required|date'
        ];
    }
}
