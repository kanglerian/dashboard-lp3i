<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Benefit;
use Illuminate\Support\Facades\File;

class BenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $benefits = Benefit::all();
        return view('pages.benefit.index')->with([
            'benefits' => $benefits,
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
            'image' => 'required|image|mimes:png,jpg,jpeg|max:1024|dimensions:ratio=1/1',
            'status' => 'required|boolean|not_in:Pilih',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('benefits'), $imageName);
        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => 'benefits/' . $imageName,
            'status' => $request->input('status'),
        ];
        Benefit::create($data);
        return back()->with('message', 'Data benefit berhasil ditambahkan!');
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
        $benefit = Benefit::findOrFail($id);
        return view('pages.benefit.edit')->with([
            'benefit' => $benefit,
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
            'image' => 'image|mimes:png,jpg,jpeg|max:1024|dimensions:ratio=1/1',
            'status' => 'required|boolean|not_in:Pilih',
        ]);

        $benefit = Benefit::findOrFail($id);

        if ($request->image) {
            File::delete(public_path($benefit->image));
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('benefits'), $imageName);
            $data = [
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'image' => 'benefits/' . $imageName,
                'status' => $request->input('status'),
            ];
        } else {
            $data = [
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'status' => $request->input('status'),
            ];
        }

        $benefit->update($data);

        return back()->with('message', 'Data benefit berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $benefit = Benefit::findOrFail($id);
        File::delete(public_path($benefit->image));
        $benefit->delete();

        return back()->with('message', 'Data benefit berhasil dihapus!');
    }
}
