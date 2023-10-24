<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Program;

class ProgramAPIController extends Controller
{
    public function index()
    {
        $programs = Program::with('interest')->get();
        return response()->json($programs);
    }

    public function show($uuid)
    {
        $program = Program::where('uuid', $uuid)->first();
        return response()->json($program);
    }
}
