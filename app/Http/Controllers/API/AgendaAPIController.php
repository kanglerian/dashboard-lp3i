<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Agenda;

class AgendaAPIController extends Controller
{
    public function index()
    {
        $agendas = Agenda::orderBy('date','desc')->get();
        return response()->json($agendas);
    }
}
