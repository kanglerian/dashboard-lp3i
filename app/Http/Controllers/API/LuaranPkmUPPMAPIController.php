<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DataUPPM;
use Illuminate\Http\Request;

class LuaranPkmUPPMAPIController extends Controller
{
    public function index()
    {
        $data = DataUPPM::all();
        return response()->json($data);
    }
}
