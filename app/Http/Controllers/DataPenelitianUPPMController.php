<?php

namespace App\Http\Controllers;

use App\Models\DataUPPM;
use Illuminate\Http\Request;

class DataPenelitianUPPMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_uppms = DataUPPM::orderBy('year','desc')->where('type','Penelitian')->get();
        return view('pages.uppm.data-penelitian.index')->with([
            'data_uppms' => $data_uppms,
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
        ]);

        $data = [
            'title' => $request->input('title'),
            'writter' => $request->input('writter'),
            'type' => $request->input('type'),
            'year' => $request->input('year'),
            'status' => $request->input('status'),
        ];
        DataUPPM::create($data);
        return back()->with('message', 'Data Penelitian UPPM berhasil ditambahkan!');
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
        $data_uppm = DataUPPM::findOrFail($id);
        return view('pages.uppm.data-penelitian.edit')->with([
            'data_uppm' => $data_uppm,
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
        $data_uppm = DataUPPM::findOrFail($id);

        $data = [
            'title' => $request->input('title'),
            'writter' => $request->input('writter'),
            'type' => $request->input('type'),
            'year' => $request->input('year'),
            'status' => $request->input('status'),
        ];

        $data_uppm->update($data);

        return back()->with('message', 'Data Penelitian UPPM berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_uppm = DataUPPM::findOrFail($id);
        $data_uppm->delete();

        return back()->with('message', 'Data penelitian UPPM berhasil dihapus!');
    }
}
