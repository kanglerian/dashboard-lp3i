<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;
use Illuminate\Support\Facades\File;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilities = Facility::all();
        return view('pages.facility.index')->with([
            'facilities' => $facilities,
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
            'image' => 'required|image|mimes:png,jpg,jpeg|max:1024|dimensions:ratio=16/9',
            'status' => 'required|boolean|not_in:Pilih',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('facilities'), $imageName);
        $data = [
            'title' => $request->input('title'),
            'image' => 'facilities/' . $imageName,
            'status' => $request->input('status'),
        ];
        Facility::create($data);
        return back()->with('message', 'Data fasilitas berhasil ditambahkan!');
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
        $facility = Facility::findOrFail($id);
        return view('pages.facility.edit')->with([
            'facility' => $facility,
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
            'image' => 'image|mimes:png,jpg,jpeg|max:1024|dimensions:ratio=16/9',
            'status' => 'required|boolean|not_in:Pilih',
        ]);

        $facility = Facility::findOrFail($id);

        if ($request->image) {
            File::delete(public_path($facility->image));
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('facilities'), $imageName);
            $data = [
                'title' => $request->input('title'),
                'image' => 'facilities/' . $imageName,
                'status' => $request->input('status'),
            ];
        } else {
            $data = [
                'title' => $request->input('title'),
                'status' => $request->input('status'),
            ];
        }

        $facility->update($data);

        return back()->with('message', 'Data fasilitas berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facility = Facility::findOrFail($id);
        File::delete(public_path($facility->image));
        $facility->delete();

        return back()->with('message', 'Data fasilitas berhasil dihapus!');
    }
}
