<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleAPIController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('date','desc')->get();
        return response()->json($articles);
    }

    public function show($uuid)
    {
        $article = Article::where('uuid', $uuid)->first();
        return response()->json($article);
    }
}
