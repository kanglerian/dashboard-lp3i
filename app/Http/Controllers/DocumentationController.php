<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documentation;
use Illuminate\Support\Facades\File;

class DocumentationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentations = Documentation::all();
        return view('pages.documentation.index')->with([
            'documentations' => $documentations,
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
            'title' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:1024|dimensions:ratio=16/9',
            'status' => 'required|boolean',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('documentations'), $imageName);
        $data = [
            'title' => $request->input('title'),
            'image' => 'documentations/' . $imageName,
            'status' => $request->input('status'),
        ];
        Documentation::create($data);
        return redirect('documentation')->with('message', 'Data dokumentasi berhasil ditambahkan!');
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
        $documentation = Documentation::findOrFail($id);
        return view('pages.documentation.edit')->with([
            'documentation' => $documentation,
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
        $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:1024|dimensions:ratio=16/9',
            'status' => 'required|boolean',
        ]);

        $documentation = Documentation::findOrFail($id);

        if ($request->image) {
            File::delete(public_path($documentation->image));
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('documentations'), $imageName);
            $data = [
                'title' => $request->input('title'),
                'image' => 'documentations/' . $imageName,
                'status' => $request->input('status'),
            ];
        } else {
            $data = [
                'title' => $request->input('title'),
                'status' => $request->input('status'),
            ];
        }

        $documentation->update($data);

        return redirect('documentation')->with('message', 'Data dokumentasi berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $documentation = Documentation::findOrFail($id);
        File::delete(public_path($documentation->image));
        $documentation->delete();

        return redirect('documentation')->with('message', 'Data dokumentasi berhasil dihapus!');
    }
}
