<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class Controller
{
    function getClients() {
        return DB::table('clients')->get();
    }
    function getLawyers() {
        return DB::table('lawyers')->get();
    }
    function getRules(){
        return [
            'firstname' => 'required|string|min:2|max:255',
            'lastname' => 'required|string|min:2|max:255',
            'email' => 'email:rfc',
            'phone' => 'integer'
        ];
    }
}
