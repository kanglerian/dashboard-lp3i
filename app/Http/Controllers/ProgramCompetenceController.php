<?php

namespace App\Http\Controllers;

use App\Models\ProgramCompetence;
use Illuminate\Http\Request;

class ProgramCompetenceController extends Controller
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
            'competence' => 'required',
        ]);

        $data = [
            'uuid' => $request->input('uuid'),
            'competence' => $request->input('competence'),
            'status' => 1,
        ];
        ProgramCompetence::create($data);
        return back()->with('kompetensi', 'Data kompetensi berhasil ditambahkan!');
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
            'competence' => 'required',
            'status' => 'required|boolean',
        ]);
        $programCompetence = ProgramCompetence::findOrFail($id);
        $data = [
            'uuid' => $request->input('uuid'),
            'competence' => $request->input('competence'),
            'status' => $request->input('status'),
        ];
        $programCompetence->update($data);
        return back()->with('kompetensi', 'Data kompetensi berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $programCompetence = ProgramCompetence::findOrFail($id);
        $programCompetence->delete();

        return back()->with('kompetensi', 'Data kompetensi berhasil dihapus!');
    }
}
