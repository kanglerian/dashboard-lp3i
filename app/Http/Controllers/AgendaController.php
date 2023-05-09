<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use Illuminate\Support\Facades\File;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agendas = Agenda::all();
        return view('pages.agenda.index')->with([
            'agendas' => $agendas,
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
            'date' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:1024|dimensions:ratio=4/5',
            'status' => 'required|boolean',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('agendas'), $imageName);
        $data = [
            'title' => $request->input('title'),
            'date' => $request->input('date'),
            'image' => 'agendas/' . $imageName,
            'status' => $request->input('status'),
        ];
        Agenda::create($data);
        return redirect('agenda')->with('message', 'Data agenda berhasil ditambahkan!');
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
        $agenda = Agenda::findOrFail($id);
        return view('pages.agenda.edit')->with([
            'agenda' => $agenda,
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
            'date' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:1024|dimensions:ratio=16/9',
            'status' => 'required|boolean',
        ]);

        $agenda = Agenda::findOrFail($id);

        if ($request->image) {
            File::delete(public_path($agenda->image));
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('agendas'), $imageName);
            $data = [
                'title' => $request->input('title'),
                'date' => $request->input('date'),
                'image' => 'agendas/' . $imageName,
                'status' => $request->input('status'),
            ];
        } else {
            $data = [
                'title' => $request->input('title'),
                'date' => $request->input('date'),
                'status' => $request->input('status'),
            ];
        }

        $agenda->update($data);

        return redirect('agenda')->with('message', 'Data agenda berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);
        File::delete(public_path($agenda->image));
        $agenda->delete();

        return redirect('agenda')->with('message', 'Data agenda berhasil dihapus!');
    }
}