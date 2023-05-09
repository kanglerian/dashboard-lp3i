<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgramBenefit;

class ProgramBenefitAPIController extends Controller
{
    public function index()
    {
        $benefits = ProgramBenefit::all();
        return response()->json($benefits);
    }
    public function show($uuid)
    {
        $program = ProgramBenefit::where('uuid', $uuid)->get();
        return response()->json($program);
    }
}
