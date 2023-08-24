<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DataUPPM;
use Illuminate\Http\Request;

class LuaranPkmUPPMAPIController extends Controller
{
    public function index()
    {
        $data = DataUPPM::orderBy('year','desc')->where('type','PKM')->get();
        return response()->json($data);
    }
}
