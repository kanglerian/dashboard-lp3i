<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\LuaranUPPM;
use Illuminate\Http\Request;

class LuaranPkmUPPMAPIController extends Controller
{
    public function index()
    {
        $data = LuaranUPPM::orderBy('year','desc')->where('type','PKM')->get();
        return response()->json($data);
    }
}
