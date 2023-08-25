<?php

namespace App\Http\Controllers;

use App\Models\BookChapter;
use Illuminate\Http\Request;

class BookChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = BookChapter::orderBy('year','desc')->get();
        return view('pages.uppm.bookchapter.index')->with([
            'books' => $books,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required',
            'title' => 'required',
            'year' => 'required',
        ]);

        $data = [
            'name' => $request->input('name'),
            'title' => $request->input('title'),
            'pamedal' => $request->input('pamedal'),
            'year' => $request->input('year'),
            'isbn' => $request->input('isbn'),
            'hki' => $request->input('hki'),
            'status' => $request->input('status'),
        ];
        BookChapter::create($data);
        return redirect('bookchapter')->with('message', 'Data Book Chapter berhasil ditambahkan!');
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
        $book = BookChapter::findOrFail($id);
        return view('pages.uppm.bookchapter.edit')->with([
            'book' => $book,
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
        $book = BookChapter::findOrFail($id);

        $data = [
            'name' => $request->input('name'),
            'title' => $request->input('title'),
            'pamedal' => $request->input('pamedal'),
            'year' => $request->input('year'),
            'isbn' => $request->input('isbn'),
            'hki' => $request->input('hki'),
            'status' => $request->input('status'),
        ];

        $book->update($data);

        return redirect('bookchapter')->with('message', 'Data book chapter berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = BookChapter::findOrFail($id);
        $book->delete();

        return redirect('bookchapter')->with('message', 'Data book chapter berhasil dihapus!');
    }
}
