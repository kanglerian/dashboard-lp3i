<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('pages.company.index')->with([
            'companies' => $companies,
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
            'name' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:1024',
            'status' => 'required|boolean',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('companies'), $imageName);
        $data = [
            'name' => $request->input('name'),
            'image' => 'companies/' . $imageName,
            'status' => $request->input('status'),
        ];
        Company::create($data);
        return redirect('company')->with('message', 'Data perusahaan berhasil ditambahkan!');
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
        $company = Company::findOrFail($id);
        return view('pages.company.edit')->with([
            'company' => $company,
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
            'name' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:1024',
            'status' => 'required|boolean',
        ]);

        $company = Company::findOrFail($id);

        if ($request->image) {
            File::delete(public_path($company->image));
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('companies'), $imageName);
            $data = [
                'name' => $request->input('name'),
                'image' => 'benefits/' . $imageName,
                'status' => $request->input('status'),
            ];
        } else {
            $data = [
                'name' => $request->input('name'),
                'status' => $request->input('status'),
            ];
        }

        $company->update($data);

        return redirect('company')->with('message', 'Data benefit berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        File::delete(public_path($company->image));
        $company->delete();

        return redirect('company')->with('message', 'Data perusahaan berhasil dihapus!');
    }
}
