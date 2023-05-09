<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerAPIController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return response()->json([
            'title' => $banners->title,
            'image' => $banners->image,
            'status' => $banners->status,
        ]);
    }
}
