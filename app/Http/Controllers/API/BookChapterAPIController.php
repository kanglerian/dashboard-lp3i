<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BookChapter;
use Illuminate\Http\Request;

class BookChapterAPIController extends Controller
{
    public function index()
    {
        $data = BookChapter::orderBy('year','desc')->get();
        return response()->json($data);
    }
}
