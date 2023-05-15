<?php

namespace App\Http\Controllers;

use App\Models\ProgramAlumni;
use Illuminate\Http\Request;

class ProgramAlumniController extends Controller
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
            'image' => 'required|image|mimes:png,jpg,jpeg|max:1024|dimensions:ratio=1/1',
            'name' => 'required',
            'school' => 'required',
            'work' => 'required',
            'profession' => 'required',
            'quote' => 'required',
            'year' => 'required',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('alumnis'), $imageName);

        $data = [
            'uuid' => $request->input('uuid'),
            'image' => 'alumnis/' . $imageName,
            'name' => $request->input('name'),
            'school' => $request->input('school'),
            'work' => $request->input('work'),
            'profession' => $request->input('profession'),
            'quote' => $request->input('quote'),
            'year' => $request->input('year'),
            'status' => 1,
        ];
        ProgramAlumni::create($data);
        return back()->with('alumni', 'Data alumni berhasil ditambahkan!');
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
            'image' => 'image|mimes:png,jpg,jpeg|max:1024|dimensions:ratio=1/1',
            'name' => 'required',
            'school' => 'required',
            'work' => 'required',
            'profession' => 'required',
            'quote' => 'required',
            'year' => 'required',
            'status' => 'required|boolean',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('alumnis'), $imageName);

        $ProgramAlumni = ProgramAlumni::findOrFail($id);

        if ($request->image) {
            File::delete(public_path($ProgramAlumni->image));
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('alumnis'), $imageName);
            $data = [
                'uuid' => $request->input('uuid'),
                'image' => 'alumnis/' . $imageName,
                'name' => $request->input('name'),
                'school' => $request->input('school'),
                'work' => $request->input('work'),
                'profession' => $request->input('profession'),
                'quote' => $request->input('quote'),
                'year' => $request->input('year'),
                'status' => $request->input('status'),
            ];
        } else {
            $data = [
                'uuid' => $request->input('uuid'),
                'name' => $request->input('name'),
                'school' => $request->input('school'),
                'work' => $request->input('work'),
                'profession' => $request->input('profession'),
                'quote' => $request->input('quote'),
                'year' => $request->input('year'),
                'status' => $request->input('status'),
            ];
        }

        
        $ProgramAlumni->update($data);
        return back()->with('alumni', 'Data alumni berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ProgramAlumni = ProgramAlumni::findOrFail($id);
        File::delete(public_path($ProgramAlumni->image));
        $ProgramAlumni->delete();

        return back()->with('alumni', 'Data alumni berhasil dihapus!');
    }
}
