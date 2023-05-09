<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Documentation;

class DocumentationAPIController extends Controller
{
    public function index()
    {
        $documentations = Documentation::all();
        return response()->json([
            'title' => $documentations->title,
            'image' => $documentations->image,
            'status' => $documentations->status,
        ]);
    }
}
