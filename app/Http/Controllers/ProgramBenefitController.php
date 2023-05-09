<?php

namespace App\Http\Controllers;

use App\Models\ProgramBenefit;
use Illuminate\Http\Request;

class ProgramBenefitController extends Controller
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
            'benefit' => 'required',
        ]);

        $data = [
            'uuid' => $request->input('uuid'),
            'benefit' => $request->input('benefit'),
            'status' => 1,
        ];
        ProgramBenefit::create($data);
        return back()->with('keunggulan', 'Data keunggulan berhasil ditambahkan!');
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
            'benefit' => 'required',
            'status' => 'required|boolean',
        ]);
        $programBenefit = ProgramBenefit::findOrFail($id);
        $data = [
            'uuid' => $request->input('uuid'),
            'benefit' => $request->input('benefit'),
            'status' => $request->input('status'),
        ];
        $programBenefit->update($data);
        return back()->with('keunggulan', 'Data keunggulan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $programBenefit = ProgramBenefit::findOrFail($id);
        $programBenefit->delete();

        return back()->with('keunggulan', 'Data keunggulan berhasil dihapus!');
    }
}
