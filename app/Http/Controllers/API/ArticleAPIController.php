<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleAPIController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return response()->json($articles);
    }
}
