<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PanduanUPPM;

class PanduanUPPMAPIController extends Controller
{
    public function index()
    {
        $panduanuppms = PanduanUPPM::all();
        return response()->json($panduanuppms);
    }
}
