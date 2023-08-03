<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flyer;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class FlyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flyers = Flyer::all();
        return view('pages.flyer.index')->with([
            'flyers' => $flyers,
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
            'headline' => 'required|string',
            'paragraph' => 'required|string',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:1024',
            'location' => 'required|string|not_in:Pilih Lokasi',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('flyers'), $imageName);
        $data = [
            'headline' => $request->input('headline'),
            'paragraph' => $request->input('paragraph'),
            'location' => $request->input('location'),
            'image' => 'flyers/' . $imageName,
            'status' => 0,
        ];
        Flyer::create($data);
        return back()->with('message', 'Data flyer berhasil ditambahkan!');
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
        $flyer = Flyer::findOrFail($id);
        return view('pages.flyer.edit')->with([
            'flyer' => $flyer,
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
            'headline' => 'required|string',
            'paragraph' => 'required|string',
            'image' => 'image|mimes:png,jpg,jpeg|max:1024',
            'location' => 'required|string|not_in:Pilih Lokasi',
            'status' => 'boolean|not_in:Pilih',
        ]);

        $flyer = Flyer::findOrFail($id);

        if ($request->image) {
            File::delete(public_path($flyer->image));
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('flyers'), $imageName);
            $data = [
                'headline' => $request->input('headline'),
                'paragraph' => $request->input('paragraph'),
                'location' => $request->input('location'),
                'image' => 'flyers/' . $imageName,
                'status' => $request->input('status'),
            ];
        } else {
            $data = [
                'headline' => $request->input('headline'),
                'paragraph' => $request->input('paragraph'),
                'location' => $request->input('location'),
                'status' => $request->input('status'),
            ];
        }

        $flyer->update($data);

        return back()->with('message', 'Data flyer berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flyer = Flyer::findOrFail($id);
        File::delete(public_path($flyer->image));
        $flyer->delete();

        return back()->with('message', 'Data flyer berhasil dihapus!');
    }


    public function status(Request $request, $id)
    {   
        $flyer = Flyer::findOrFail($id);
        $data = [
            'status' => $flyer->status == 0 ? 1 : 0,
        ];
        $non = [
            'status' => 0,
        ];
        Flyer::where('status', 1)->update($non);
        $flyer->update($data);

        return back()->with('message', 'Data flyer berhasil diubah!');
    }
}
