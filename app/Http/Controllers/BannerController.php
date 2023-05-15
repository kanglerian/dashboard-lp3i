<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Banner;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('pages.banner.index')->with([
            'banners' => $banners,
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
            'status' => 'required|boolean',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('banners'), $imageName);
        $data = [
            'title' => $request->input('title'),
            'image' => 'banners/' . $imageName,
            'status' => $request->input('status'),
        ];
        Banner::create($data);
        return redirect('banner')->with('message', 'Data Banner berhasil ditambahkan!');
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
        $banner = Banner::findOrFail($id);
        return view('pages.banner.edit')->with([
            'banner' => $banner,
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
            'status' => 'required|boolean',
        ]);

        $banner = Banner::findOrFail($id);

        if ($request->image) {
            File::delete(public_path($banner->image));
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('banners'), $imageName);
            $data = [
                'title' => $request->input('title'),
                'image' => 'banners/' . $imageName,
                'status' => $request->input('status'),
            ];
        } else {
            $data = [
                'title' => $request->input('title'),
                'status' => $request->input('status'),
            ];
        }

        $banner->update($data);

        return redirect('banner')->with('message', 'Data Banner berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        File::delete(public_path($banner->image));
        $banner->delete();

        return redirect('banner')->with('message', 'Data Banner berhasil dihapus!');
    }
}
