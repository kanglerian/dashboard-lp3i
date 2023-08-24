@extends('layouts.dashboard')

@section('content')
    <div class="flex-1 overflow-x-auto px-2">
        <div class="space-y-2">
            <a href="{{ route('luaranpenelitianuppm.index') }}"
                class="inline-block text-sm bg-slate-100 text-slate-900 px-4 py-2 rounded-lg mb-2"><span><i
                        class="fa-solid fa-circle-chevron-left"></i></span> Kembali</a>
            <a href="{{ route('luaranpenelitianuppm.index') }}">
                <h1 class="font-bold text-2xl">Edit {{ $luaran_uppm->title }}</h1>
            </a>
            <p class="text-gray-500 text-sm">Fitur spanduk adalah gambar yang dapat digunakan pada halaman depan untuk
                menyampaikan informasi atau iklan. Ini adalah cara yang berguna dan nyaman untuk memperbarui konten tanpa
                harus mengubah bagian lain dari halaman.</p>
        </div>
        <div class="flex flex-col md:flex-row gap-5 mt-5">
            <div class="w-full">
                <form action="{{ route('luaranpenelitianuppm.update', $luaran_uppm->id) }}" class="flex flex-col gap-2"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="flex-1">
                        <input type="text" name="title" value="{{ $luaran_uppm->title }}"
                            class="w-full p-2 text-gray-700 border border-gray-300 @error('title') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Tulis judul disini..">
                        <small class="mt-2 text-xs text-red-500">
                            {{ $errors->first('title') }}</small>
                    </div>
                    <div class="flex-1">
                        <input type="text" name="writter" value="{{ $luaran_uppm->writter }}"
                            class="w-full p-2 text-gray-700 border border-gray-300 @error('writter') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Tulis nama penulis disini..">
                        <small class="mt-2 text-xs text-red-500">
                            {{ $errors->first('writter') }}</small>
                    </div>
                    <div class="flex-1">
                        <input type="hidden" name="type" value="{{ $luaran_uppm->type }}">
                        <input type="text" name="writter" value="{{ $luaran_uppm->writter }}"
                            class="w-full p-2 text-gray-700 border border-gray-300 @error('writter') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Tulis nama penulis disini..">
                        <small class="mt-2 text-xs text-red-500">
                            {{ $errors->first('writter') }}</small>
                    </div>
                    <div class="flex-1">
                        <select name="publication"
                            class="w-full p-2 text-gray-700 border border-gray-300 @error('publication') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                            required>
                            <option value="{{ $luaran_uppm->publication }}">{{ $luaran_uppm->publication }}</option>
                            <option value="Jurnal Internasional">Jurnal Internasional</option>
                            <option value="Jurnal Internasional Bereputasi">Jurnal Internasional Bereputasi</option>
                            <option value="Jurnal Nasional Terakreditasi">Jurnal Nasional Terakreditasi</option>
                            <option value="Jurnal Tidak Terakreditasi">Jurnal Tidak Terakreditasi</option>
                        </select>
                    </div>
                    <div class="flex-1">
                        <input type="text" name="indexjurnal" value="{{ $luaran_uppm->indexjurnal }}"
                            class="w-full p-2 text-gray-700 border border-gray-300 @error('indexjurnal') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Tulis index jurnal disini..">
                        <small class="mt-2 text-xs text-red-500">
                            {{ $errors->first('indexjurnal') }}</small>
                    </div>
                    <div class="flex-1">
                        <input type="number" name="year" value="{{ $luaran_uppm->year }}"
                            class="w-full p-2 text-gray-700 border border-gray-300 @error('year') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Tulis tahun disini..">
                        <small class="mt-2 text-xs text-red-500">
                            {{ $errors->first('year') }}</small>
                    </div>
                    <div class="flex-1">
                        <input type="text" name="link" value="{{ $luaran_uppm->link }}"
                            class="w-full p-2 text-gray-700 border border-gray-300 @error('link') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Tulis link disini..">
                        <small class="mt-2 text-xs text-red-500">
                            {{ $errors->first('link') }}</small>
                    </div>
                    <div class="flex-2">
                        <select name="status"
                            class="w-full p-2 text-gray-700 border border-gray-300 @error('status') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                            required>
                            <option value="{{ $luaran_uppm->status }}">
                                {{ $luaran_uppm->status == 1 ? 'Aktif' : 'Tidak aktif' }}
                            </option>
                            <option value="{{ $luaran_uppm->status == 1 ? 0 : 1 }}">
                                {{ $luaran_uppm->status == 1 ? 'Tidak aktif' : 'Aktif' }}
                            </option>
                        </select>
                        <small class="mt-2 text-xs text-red-500">
                            {{ $errors->first('status') }}</small>
                    </div>
                    <div>
                        <button type="submit" class="bg-cyan-600 text-white text-sm py-2 px-3 rounded-md"><i
                                class="fa-solid fa-floppy-disk"></i> <span id="btnSubmit">Simpan perubahan</span></button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
