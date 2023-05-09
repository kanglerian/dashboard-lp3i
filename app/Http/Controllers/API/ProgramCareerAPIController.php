<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgramCareer;

class ProgramCareerAPIController extends Controller
{
    public function index()
    {
        $careers = ProgramCareer::all();
        return response()->json($careers);
    }
    public function show($uuid)
    {
        $program = ProgramCareer::where('uuid', $uuid)->get();
        return response()->json($program);
    }
}
