<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgramVision;

class ProgramVisionAPIController extends Controller
{
    public function index()
    {
        $visions = ProgramVision::all();
        return response()->json($visions);
    }
    public function show($uuid)
    {
        $program = ProgramVision::where('uuid', $uuid)->get();
        return response()->json($program);
    }
}
