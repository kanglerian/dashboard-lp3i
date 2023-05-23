<?php

namespace App\Http\Controllers;

use App\Models\ProgramVision;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProgramVisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
            'vision' => 'required',
        ]);

        $data = [
            'uuid' => $request->input('uuid'),
            'vision' => $request->input('vision'),
            'status' => 1,
        ];
        ProgramVision::create($data);
        return back()->with('message', 'Data visi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
            'vision' => 'required',
            'status' => 'required|boolean|not_in:Pilih',
        ]);
        $programVision = ProgramVision::findOrFail($id);
        $data = [
            'uuid' => $request->input('uuid'),
            'vision' => $request->input('vision'),
            'status' => $request->input('status'),
        ];
        $programVision->update($data);
        return back()->with('message', 'Data visi berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $programVision = ProgramVision::findOrFail($id);
        $programVision->delete();

        return back()->with('message', 'Data visi berhasil dihapus!');
    }
}
