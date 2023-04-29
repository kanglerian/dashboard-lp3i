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
}
