<?php

namespace App\Http\Controllers;

use App\Models\ProgramMision;
use Illuminate\Http\Request;

class ProgramMisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'uuid' => 'required',
            'mision' => 'required',
        ]);

        $data = [
            'uuid' => $request->input('uuid'),
            'mision' => $request->input('mision'),
            'status' => 1,
        ];
        ProgramMision::create($data);
        return back()->with('message', 'Data misi berhasil ditambahkan!');
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
        //
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
            'uuid' => 'required',
            'mision' => 'required',
            'status' => 'required|boolean|not_in:Pilih',
        ]);
        $programMision = ProgramMision::findOrFail($id);
        $data = [
            'uuid' => $request->input('uuid'),
            'mision' => $request->input('mision'),
            'status' => $request->input('status'),
        ];
        $programMision->update($data);
        return back()->with('message', 'Data misi berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
        */
    public function destroy($id)
    {
        $programMision = ProgramMision::findOrFail($id);
        $programMision->delete();

        return back()->with('message', 'Data misi berhasil dihapus!');
    }
}
