<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Media;

class MediaAPIController extends Controller
{
    public function index()
    {
        $medias = Media::all();
        return response()->json($medias);
    }
}
