<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Company;

class CompanyAPIController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return response()->json($companies);
    }
}
