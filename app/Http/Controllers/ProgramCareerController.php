<?php

namespace App\Http\Controllers;

use App\Models\ProgramCareer;
use Illuminate\Http\Request;

class ProgramCareerController extends Controller
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
            'career' => 'required',
        ]);

        $data = [
            'uuid' => $request->input('uuid'),
            'career' => $request->input('career'),
            'status' => 1,
        ];
        ProgramCareer::create($data);
        return back()->with('message', 'Data karir berhasil ditambahkan!');
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
            'career' => 'required',
            'status' => 'required|boolean|not_in:Pilih',
        ]);
        $programCareer = ProgramCareer::findOrFail($id);
        $data = [
            'uuid' => $request->input('uuid'),
            'career' => $request->input('career'),
            'status' => $request->input('status'),
        ];
        $programCareer->update($data);
        return back()->with('message', 'Data karir berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $programCareer = ProgramCareer::findOrFail($id);
        $programCareer->delete();

        return back()->with('message', 'Data karir berhasil dihapus!');
    }
}
