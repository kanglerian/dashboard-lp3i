<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Facility;

class FacilityAPIController extends Controller
{
    public function index()
    {
        $facilities = Facility::all();
        return response()->json($facilities);
    }
}
