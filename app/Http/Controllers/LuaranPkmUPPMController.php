<?php

namespace App\Http\Controllers;

use App\Models\LuaranUPPM;
use Illuminate\Http\Request;

class LuaranPkmUPPMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $luaran_uppms = LuaranUPPM::orderBy('year','desc')->where('type','PKM')->get();
        return view('pages.uppm.luaran-pkm.index')->with([
            'luaran_uppms' => $luaran_uppms,
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
            'year' => 'required',
            'link' => 'required'
        ]);
        $data = [
            'title' => $request->input('title'),
            'writter' => $request->input('writter'),
            'type' => $request->input('type'),
            'publication' => $request->input('publication'),
            'indexjurnal' => $request->input('indexjurnal'),
            'year' => $request->input('year'),
            'link' => $request->input('link'),
            'status' => $request->input('status'),
        ];
        LuaranUPPM::create($data);
        return back()->with('message', 'Data Luaran UPPM berhasil ditambahkan!');
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
        $luaran_uppm = LuaranUPPM::findOrFail($id);
        return view('pages.uppm.luaran-pkm.edit')->with([
            'luaran_uppm' => $luaran_uppm,
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
        $luaran_uppm = LuaranUPPM::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'year' => 'required',
            'link' => 'required'
        ]);

        $data = [
            'title' => $request->input('title'),
            'writter' => $request->input('writter'),
            'type' => $request->input('type'),
            'publication' => $request->input('publication'),
            'indexjurnal' => $request->input('indexjurnal'),
            'year' => $request->input('year'),
            'link' => $request->input('link'),
            'status' => $request->input('status'),
        ];

        $luaran_uppm->update($data);

        return back()->with('message', 'Data Luaran UPPM berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $luaran_uppm = LuaranUPPM::findOrFail($id);
        $luaran_uppm->delete();

        return back()->with('message', 'Data Luaran UPPM berhasil dihapus!');
    }
}
