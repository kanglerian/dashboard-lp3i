<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Program;

class ProgramAPIController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        return response()->json($programs);
    }

    public function show($uuid)
    {
        $program = Program::where('uuid', $uuid)->first();
        return response()->json($program);
    }
}
