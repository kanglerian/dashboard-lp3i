<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = Information::all();
        return view('pages.information.index')->with([
            'informations' => $informations,
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
            'locate' => 'required|not_in:Pilih lokasi',
            'youtube' => 'required'
        ]);
        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'youtube' => $request->input('youtube'),
            'locate' => $request->input('locate'),
            'status' => 0
        ];
        Information::create($data);
        return back()->with('message', 'Data informasi berhasil ditambahkan!');
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
        $information = Information::findOrFail($id);
        return view('pages.information.edit')->with([
            'information' => $information,
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
            'youtube' => 'required',
            'locate' => 'required|not_in:Pilih lokasi',
        ]);

        $company = Information::findOrFail($id);

        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'youtube' => $request->input('youtube'),
            'locate' => $request->input('locate'),
        ];

        $company->update($data);

        return back()->with('message', 'Data informasi berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = Information::findOrFail($id);
        $information->delete();

        return back()->with('message', 'Data informasi berhasil dihapus!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, $id)
    {   
        $information = Information::findOrFail($id);
        $locate = $request->input('locate');
        $data = [
            'status' => $information->status == 0 ? 1 : 0,
        ];
        $non = [
            'status' => 0,
        ];
        Information::where('status', 1)->where('locate', $locate)->update($non);
        $information->update($data);

        return back()->with('message', 'Data informasi berhasil diubah!');
    }
}
