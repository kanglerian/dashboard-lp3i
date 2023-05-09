<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ormawa;

class OrmawaAPIController extends Controller
{
    public function index()
    {
        $ormawas = Ormawa::all();
        return response()->json([
            'title' => $ormawas->title,
            'description' => $ormawas->description,
            'image' => $ormawas->image,
            'status' => $ormawas->status
        ]);
    }
}
