<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Agenda;

class AgendaAPIController extends Controller
{
    public function index()
    {
        $agendas = Agenda::all();
        return response()->json([
            'title' => $agendas->title,
            'date' => $agendas->date,
            'image' => $agendas->image,
            'status' => $agendas->status,
        ]);
    }
}
