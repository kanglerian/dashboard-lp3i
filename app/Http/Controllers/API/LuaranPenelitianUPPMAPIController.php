<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DataUPPM;
use Illuminate\Http\Request;

class LuaranPenelitianUPPMAPIController extends Controller
{
    public function index()
    {
        $data = DataUPPM::orderBy('year','desc')->where('type','Penelitian')->get();
        return response()->json($data);
    }
}
