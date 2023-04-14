<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Information;

class InformationAPIController extends Controller
{
    public function index()
    {
        $informations = Information::all();
        return response()->json($informations);
    }
}
