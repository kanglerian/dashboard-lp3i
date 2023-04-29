<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ormawa;
use Illuminate\Support\Facades\File;

class OrmawaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ormawas = Ormawa::all();
        return view('pages.ormawa.index')->with([
            'ormawas' => $ormawas,
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
            'description' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:1024|dimensions:ratio=16/9',
            'status' => 'required|boolean',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('benefits'), $imageName);
        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => 'benefits/' . $imageName,
            'status' => $request->input('status'),
        ];
        Ormawa::create($data);
        return redirect('benefit')->with('message', 'Data benefit berhasil ditambahkan!');
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
        $ormawa = Ormawa::findOrFail($id);
        return view('pages.ormawa.edit')->with([
            'ormawa' => $ormawa,
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
            'description' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:1024|dimensions:ratio=16/9',
            'status' => 'required|boolean',
        ]);

        $ormawa = Ormawa::findOrFail($id);

        if ($request->image) {
            File::delete(public_path($ormawa->image));
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('ormawas'), $imageName);
            $data = [
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'image' => 'ormawas/' . $imageName,
                'status' => $request->input('status'),
            ];
        } else {
            $data = [
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'status' => $request->input('status'),
            ];
        }

        $ormawa->update($data);

        return redirect('ormawa')->with('message', 'Data organisasi mahasiswa berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ormawa = Ormawa::findOrFail($id);
        File::delete(public_path($ormawa->image));
        $ormawa->delete();

        return redirect('ormawa')->with('message', 'Data organisasi mahasiswa berhasil dihapus!');
    }
}
