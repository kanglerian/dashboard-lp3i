<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Program;

class ProgramAPIController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        return response()->json([
            'uuid' => $programs->uuid,
            'title' => $programs->title,
            'campus' => $programs->campus,
            'level' => $programs->level,
            'image' => $programs->image,
            'status' => $programs->status,
        ]);
    }

    public function show($uuid)
    {
        $program = Program::where('uuid', $uuid)->first();
        return response()->json([
            'uuid' => $program->uuid,
            'title' => $program->title,
            'campus' => $program->campus,
            'level' => $program->level,
            'image' => $program->image,
            'status' => $program->status,
        ]);
    }
}
