<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgramMision;

class ProgramMisionAPIController extends Controller
{
    public function index()
    {
        $misions = ProgramMision::all();
        return response()->json($misions);
    }
    public function show($uuid)
    {
        $program = ProgramMision::where('uuid', $uuid)->get();
        return response()->json($program);
    }
}
