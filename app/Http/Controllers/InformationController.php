<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use Illuminate\Support\Facades\File;

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
            'youtube' => 'required',
            'status' => 'required|boolean'
        ]);
        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'youtube' => $request->input('youtube'),
            'status' => $request->input('status')
        ];
        Information::create($data);
        return redirect('information')->with('message', 'Data informasi berhasil ditambahkan!');
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
            'status' => 'required|boolean'
        ]);

        $company = Information::findOrFail($id);

        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'youtube' => $request->input('youtube'),
            'status' => $request->input('status'),
        ];

        $company->update($data);

        return redirect('information')->with('message', 'Data informasi berhasil diubah!');
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

        return redirect('information')->with('message', 'Data informasi berhasil dihapus!');
    }

    public function status($id)
    {   
        $informations = Information::all();
        $information = Information::findOrFail($id);
        $data = [
            'status' => $information->status == 0 ? 1 : 0,
        ];
        $non = [
            'status' => 0,
        ];
        Information::where('status', 1)->update($non);
        $information->update($data);

        return redirect('information')->with('message', 'Data informasi berhasil diubah!');
    }
}
