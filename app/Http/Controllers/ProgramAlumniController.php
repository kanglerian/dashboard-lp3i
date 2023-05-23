<?php

namespace App\Http\Controllers;

use App\Models\ProgramAlumni;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProgramAlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::all();
        $testimonials = ProgramAlumni::all();
        return view('pages.testimonial.index')->with([
            'testimonials' => $testimonials,
            'programs' => $programs,
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
            'uuid' => 'required|not_in:Pilih Program Studi',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:1024|dimensions:ratio=1/1',
            'name' => 'required',
            'school' => 'required',
            'work' => 'required',
            'profession' => 'required',
            'quote' => 'required',
            'career' => 'required|not_in:Pilih Karir',
            'year' => 'required|digits:4|date_format:Y',
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
            'career' => $request->input('career'),
            'testimoni' => 0,
            'status' => 1,
        ];
        ProgramAlumni::create($data);
        return back()->with('message', 'Data alumni berhasil ditambahkan!');
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
        $programs = Program::all();
        $alumni = ProgramAlumni::findOrFail($id);
        return view('pages.testimonial.edit')->with([
            'alumni' => $alumni,
            'programs'=> $programs
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
            'uuid' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:1024|dimensions:ratio=1/1',
            'name' => 'required',
            'school' => 'required',
            'work' => 'required',
            'profession' => 'required',
            'quote' => 'required',
            'year' => 'required',
            'testimoni' => 'required|boolean',
            'career' => 'required',
            'status' => 'required|boolean',
        ]);

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
                'testimoni' => $request->input('testimoni'),
                'career' => $request->input('career'),
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
                'testimoni' => $request->input('testimoni'),
                'career' => $request->input('career'),
                'status' => $request->input('status'),
            ];
        }

        
        $ProgramAlumni->update($data);
        return back()->with('message', 'Data alumni berhasil diubah!');
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

        return back()->with('message', 'Data alumni berhasil dihapus!');
    }
}
