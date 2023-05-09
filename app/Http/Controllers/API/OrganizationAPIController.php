<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Organization;

class OrganizationAPIController extends Controller
{
    public function index()
    {
        $organizations = Organization::all();
        return response()->json([
            'title' => $organizations->title,
            'drawio' => $organizations->drawio,
            'status' => $organizations->status
        ]);
    }
}
