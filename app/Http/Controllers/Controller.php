<?php

namespace App\Http\Controllers;
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
    function setAppointment(Request $request) {
        $validator = Validator::make($request->all(), $this->getRules());
        if ($validator->fails()) {
            return response()-> json(['errors' => $validator->errors()],
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        return $validator->validated();
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
