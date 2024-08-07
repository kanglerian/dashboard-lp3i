<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Benefit;

class BenefitAPIController extends Controller
{
    public function index()
    {
        $benefits = Benefit::all();
        return response()->json($benefits);
    }
}
