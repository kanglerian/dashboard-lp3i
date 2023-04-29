<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use Illuminate\Support\Facades\File;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias = Media::all();
        return view('pages.media.index')->with([
            'medias' => $medias,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.media.create');
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
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('medias'), $imageName);
        $special_character = ['~', '`', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_', '-', '+', '=', '"', ':', ';', '?', '>', '.', '<', ',', "'", '{', '}', '[', ']', '/'];
        $data = [
            'uuid' => strtolower(str_replace(" ", "-", str_replace($special_character, "", $request->input('title')))),
            'title' => $request->input('title'),
            'date' => $request->input('date'),
            'image' => 'medias/' . $imageName,
            'description' => $request->input('description'),
            'status' => 1,
        ];
        Media::create($data);
        return redirect('media')->with('message', 'Data media berhasil ditambahkan!');
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
        $media = Media::findOrFail($id);
        return view('pages.media.edit')->with([
            'media' => $media,
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
        $media = Media::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:1024|dimensions:ratio=16/9',
            'description' => 'required',
            'status' => 'required|boolean',
        ]);

        if ($request->image) {
            File::delete(public_path($media->image));
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('medias'), $imageName);
            $special_character = ['~', '`', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_', '-', '+', '=', '"', ':', ';', '?', '>', '.', '<', ',', "'", '{', '}', '[', ']', '/'];
            $data = [
                'uuid' => strtolower(str_replace(" ", "-", str_replace($special_character, "", $request->input('title')))),
                'title' => $request->input('title'),
                'date' => $request->input('date'),
                'image' => 'medias/' . $imageName,
                'description' => $request->input('description'),
                'status' => $request->input('status'),
            ];
        } else {
            $special_character = ['~', '`', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_', '-', '+', '=', '"', ':', ';', '?', '>', '.', '<', ',', "'", '{', '}', '[', ']', '/'];
            $data = [
                'uuid' => strtolower(str_replace(" ", "-", str_replace($special_character, "", $request->input('title')))),
                'title' => $request->input('title'),
                'date' => $request->input('date'),
                'description' => $request->input('description'),
                'status' => $request->input('status'),
            ];
        }

        $media->update($data);

        return redirect('media')->with('message', 'Data media berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media = Media::findOrFail($id);
        File::delete(public_path($media->image));
        $media->delete();

        return redirect('media')->with('message', 'Data media berhasil dihapus!');
    }
}
