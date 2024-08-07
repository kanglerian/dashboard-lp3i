<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Information;

class InformationAPIController extends Controller
{
    public function index()
    {
        $informations = Information::all();
        return response()->json($informations);
    }
}
