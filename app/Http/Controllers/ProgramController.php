<?php

namespace App\Http\Controllers;

use App\Models\ProgramInterest;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\ProgramAlumni;
use App\Models\ProgramVision;
use App\Models\ProgramMision;
use App\Models\ProgramBenefit;
use App\Models\ProgramCareer;
use App\Models\ProgramCompetence;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::all();
        return view('pages.program.index')->with([
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
            'title' => 'required',
            'campus' => 'required|not_in:Pilih kampus',
            'level' => 'required|not_in:Pilih jenjang',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:1024|dimensions:ratio=16/9'
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('programs'), $imageName);
        $data = [
            'uuid' => Str::random(10),
            'title' => $request->input('title'),
            'campus' => $request->input('campus'),
            'level' => $request->input('level'),
            'image' => 'programs/' . $imageName,
            'status' => 0,
        ];
        Program::create($data);
        return back()->with('message', 'Data program studi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $visions = ProgramVision::where('uuid', $uuid)->get();
        $misions = ProgramMision::where('uuid', $uuid)->get();
        $benefits = ProgramBenefit::where('uuid', $uuid)->get();
        $careers = ProgramCareer::where('uuid', $uuid)->get();
        $interests = ProgramInterest::where('uuid', $uuid)->get();
        $competences = ProgramCompetence::where('uuid', $uuid)->get();
        $alumnis = ProgramAlumni::where('uuid', $uuid)->get();
        $program = Program::where('uuid', $uuid)->first();
        return view('pages.program.detail')->with([
            'program' => $program,
            'visions' => $visions,
            'misions' => $misions,
            'benefits' => $benefits,
            'interests' => $interests,
            'careers' => $careers,
            'competences' => $competences,
            'alumnis' => $alumnis,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $program = Program::findOrFail($id);
        return view('pages.program.edit')->with([
            'program' => $program,
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
            'campus' => 'required|not_in:Pilih kampus',
            'level' => 'required|not_in:Pilih jenjang',
            'image' => 'image|mimes:png,jpg,jpeg|max:1024|dimensions:ratio=16/9',
            'status' => 'required|boolean',
        ]);

        $program = Program::findOrFail($id);

        if ($request->image) {
            File::delete(public_path($program->image));
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('programs'), $imageName);
            $data = [
                'title' => $request->input('title'),
                'campus' => $request->input('campus'),
                'level' => $request->input('level'),
                'image' => 'programs/' . $imageName,
                'status' => $request->input('status'),
            ];
        } else {
            $data = [
                'title' => $request->input('title'),
                'campus' => $request->input('campus'),
                'level' => $request->input('level'),
                'status' => $request->input('status'),
            ];
        }

        $program->update($data);

        return back()->with('message', 'Data program studi berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        File::delete(public_path($program->image));
        $program->delete();

        return back()->with('message', 'Data program studi berhasil dihapus!');
    }
}
