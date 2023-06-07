<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Flyer;

class FlyerAPIController extends Controller
{
    public function index()
    {
        $flyers = Flyer::all();
        return response()->json($flyers);
    }
}
