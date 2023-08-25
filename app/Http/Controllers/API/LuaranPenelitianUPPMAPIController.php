<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\LuaranUPPM;
use Illuminate\Http\Request;

class LuaranPenelitianUPPMAPIController extends Controller
{
    public function index()
    {
        $data = LuaranUPPM::orderBy('year','desc')->where('type','Penelitian')->get();
        return response()->json($data);
    }
}
