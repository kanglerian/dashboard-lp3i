<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgramCompetence;

class ProgramCompetenceAPIController extends Controller
{
    public function index()
    {
        $competences = ProgramCompetence::all();
        return response()->json($competences);
    }
    public function show($uuid)
    {
        $program = ProgramCompetence::where('uuid', $uuid)->get();
        return response()->json($program);
    }
}
