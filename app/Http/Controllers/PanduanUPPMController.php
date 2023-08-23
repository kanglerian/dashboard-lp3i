<?php

namespace App\Http\Controllers;

use App\Models\PanduanUPPM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PanduanUPPMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $panduanuppm = PanduanUPPM::all();
        return view('pages.uppm.panduan.index')->with([
            'panduanuppm' => $panduanuppm,
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
            'type' => 'required',
            'description' => 'required',
        ]);
        $berkasName = time() . '.' . $request->file_uppm->extension();
        $request->file_uppm->move(public_path('panduan-uppm'), $berkasName);
        $data = [
            'title' => $request->input('title'),
            'file_uppm' => 'panduan-uppm/' . $berkasName,
            'type' => $request->input('type'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
        ];
        PanduanUPPM::create($data);
        return back()->with('message', 'Data panduan UPPM berhasil ditambahkan!');
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
        $panduanuppm = PanduanUPPM::findOrFail($id);
        return view('pages.uppm.panduan.edit')->with([
            'panduanuppm' => $panduanuppm,
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
        $panduan = PanduanUPPM::findOrFail($id);

        if ($request->file_uppm) {
            File::delete(public_path($panduan->file_uppm));
            $fileName = time() . '.' . $request->file_uppm->extension();
            $request->file_uppm->move(public_path('panduan-uppm'), $fileName);
            $data = [
                'title' => $request->input('title'),
                'file_uppm' => 'panduan-uppm/' . $fileName,
                'type' => $request->input('type'),
                'description' => $request->input('description'),
                'status' => $request->input('status'),
            ];
        } else {
            $data = [
                'title' => $request->input('title'),
                'type' => $request->input('type'),
                'description' => $request->input('description'),
                'status' => $request->input('status'),
            ];
        }

        $panduan->update($data);

        return back()->with('message', 'Data panduan UPPM berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $panduanuppm = PanduanUPPM::findOrFail($id);
        File::delete(public_path($panduanuppm->file_uppm));
        $panduanuppm->delete();

        return back()->with('message', 'Data panduan UPPM berhasil dihapus!');
    }
}
