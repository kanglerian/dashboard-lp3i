<?php

namespace App\Http\Controllers;

use App\Models\ProgramInterest;
use Illuminate\Http\Request;

class ProgramInterestController extends Controller
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
            'name' => 'required',
        ]);

        $data = [
            'uuid' => $request->input('uuid'),
            'name' => $request->input('name'),
            'status' => 1,
        ];
        ProgramInterest::create($data);
        return back()->with('message', 'Data peminatan berhasil ditambahkan!');
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
            'name' => 'required',
            'status' => 'required|boolean|not_in:Pilih',
        ]);
        $programInterest = ProgramInterest::findOrFail($id);
        $data = [
            'uuid' => $request->input('uuid'),
            'name' => $request->input('name'),
            'status' => $request->input('status'),
        ];
        $programInterest->update($data);
        return back()->with('message', 'Data peminatan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $programInterest = ProgramInterest::findOrFail($id);
        $programInterest->delete();

        return back()->with('message', 'Data peminatan berhasil dihapus!');
    }
}
