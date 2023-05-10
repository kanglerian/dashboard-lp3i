<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ormawa;

class OrmawaAPIController extends Controller
{
    public function index()
    {
        $ormawas = Ormawa::all();
        return response()->json($ormawas);
    }

    public function show($uuid)
    {
        $ormawa = Ormawa::where('uuid', $uuid)->get();
        return response()->json($ormawa);
    }
}
