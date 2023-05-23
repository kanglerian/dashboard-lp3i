<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizations = Organization::all();
        return view('pages.organization.index')->with([
            'organizations' => $organizations,
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
            'drawio' => 'required',
            'status' => 'required|boolean|not_in:Pilih'
        ]);
        $data = [
            'title' => $request->input('title'),
            'drawio' => $request->input('drawio'),
            'status' => $request->input('status')
        ];
        Organization::create($data);
        return back()->with('message', 'Data organisasi berhasil ditambahkan!');
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
        $organization = Organization::findOrFail($id);
        return view('pages.organization.edit')->with([
            'organization' => $organization,
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
            'drawio' => 'required',
            'status' => 'required|boolean|not_in:Pilih'
        ]);

        $organization = Organization::findOrFail($id);

        $data = [
            'title' => $request->input('title'),
            'drawio' => $request->input('drawio'),
            'status' => $request->input('status')
        ];

        $organization->update($data);

        return back()->with('message', 'Data organisasi berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $organization = Organization::findOrFail($id);
        $organization->delete();

        return back()->with('message', 'Data organisasi berhasil dihapus!');
    }

    public function status($id)
    {   
        $organization = Organization::findOrFail($id);
        $data = [
            'status' => $organization->status == 0 ? 1 : 0,
        ];
        $non = [
            'status' => 0,
        ];
        Organization::where('status', 1)->update($non);
        $organization->update($data);

        return back()->with('message', 'Data organisasi berhasil diubah!');
    }
}
