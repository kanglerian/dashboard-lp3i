<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ProgramAlumni;
use Illuminate\Http\Request;

class ProgramAlumniAPIController extends Controller
{
    public function index()
    {
        $alumnis = ProgramAlumni::all();
        return response()->json($alumnis);
    }
    public function show($uuid)
    {
        $alumni = ProgramAlumni::where('uuid', $uuid)->get();
        return response()->json($alumni);
    }
}
