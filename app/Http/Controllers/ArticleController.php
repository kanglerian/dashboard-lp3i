<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('pages.article.index')->with([
            'articles' => $articles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:1024|dimensions:ratio=16/9',
            'description' => 'required',
            'source' => 'required',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('articles'), $imageName);
        $special_character = ['~', '`', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_', '-', '+', '=', '"', ':', ';', '?', '>', '.', '<', ',', "'", '{', '}', '[', ']', '/'];
        $data = [
            'uuid' => strtolower(str_replace(" ", "-", str_replace($special_character, "", $request->input('title')))),
            'title' => $request->input('title'),
            'date' => $request->input('date'),
            'image' => 'articles/' . $imageName,
            'description' => $request->input('description'),
            'source' => $request->input('source'),
            'status' => 1,
        ];
        Article::create($data);
        return back()->with('message', 'Data artikel berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('pages.article.edit')->with([
            'article' => $article,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:1024|dimensions:ratio=16/9',
            'description' => 'required',
            'source' => 'required',
            'status' => 'required|boolean',
        ]);

        if ($request->image) {
            File::delete(public_path($article->image));
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('articles'), $imageName);
            $special_character = ['~', '`', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_', '-', '+', '=', '"', ':', ';', '?', '>', '.', '<', ',', "'", '{', '}', '[', ']', '/'];
            $data = [
                'uuid' => strtolower(str_replace(" ", "-", str_replace($special_character, "", $request->input('title')))),
                'title' => $request->input('title'),
                'date' => $request->input('date'),
                'image' => 'articles/' . $imageName,
                'description' => $request->input('description'),
                'source' => $request->input('source'),
                'status' => $request->input('status'),
            ];
        } else {
            $special_character = ['~', '`', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_', '-', '+', '=', '"', ':', ';', '?', '>', '.', '<', ',', "'", '{', '}', '[', ']', '/'];
            $data = [
                'uuid' => strtolower(str_replace(" ", "-", str_replace($special_character, "", $request->input('title')))),
                'title' => $request->input('title'),
                'date' => $request->input('date'),
                'description' => $request->input('description'),
                'source' => $request->input('source'),
                'status' => $request->input('status'),
            ];
        }

        $article->update($data);

        return back()->with('message', 'Data artikel berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        File::delete(public_path($article->image));
        $article->delete();

        return back()->with('message', 'Data artikel berhasil dihapus!');
    }
}
