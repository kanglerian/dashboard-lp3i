@extends('layouts.dashboard')

@section('content')
    <div class="flex-1 overflow-x-auto px-2">
        <div class="space-y-2">
            <a href="{{ route('ormawa.index') }}" class="inline-block text-sm bg-slate-100 text-slate-900 px-4 py-2 rounded-lg mb-2"><span><i class="fa-solid fa-circle-chevron-left"></i></span> Kembali</a>
            <a href="{{ route('ormawa.index') }}">
                <h1 class="font-bold text-2xl">Edit Organisasi Mahasiswa {{ $ormawa->title }}</h1>
            </a>
            <p class="text-gray-500 text-sm">Fitur organisasi mahasiswa adalah konten yang dapat digunakan pada halaman depan untuk menyampaikan berbagai macam organisasi mahasiswa di LP3I. Ini adalah cara yang berguna dan nyaman untuk memperbarui konten tanpa harus mengubah bagian lain dari halaman.</p>
        </div>
        <div class="flex flex-col md:flex-row gap-5 mt-5">
            <div class="w-full md:w-3/4 order-2 md:order-none">
                <form action="{{ route('ormawa.update', $ormawa->id) }}" class="flex flex-col gap-2" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="flex-1">
                        <input type="hidden" name="uuid" value="{{ $ormawa->uuid }}">
                        <input type="text" name="title" value="{{ $ormawa->title }}"
                            class="w-full p-2 text-gray-700 border border-gray-300 @error('title') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Tulis judul disini..">
                        <small class="mt-2 text-xs text-red-500">
                            {{ $errors->first('title') }}</small>
                    </div>
                    <div class="flex-1">
                        <textarea type="text" name="description" rows="10" value="{{ $ormawa->description }}"
                            class="w-full p-2 text-gray-700 border border-gray-300 @error('description') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Tulis deskripsi disini..">{{ $ormawa->description }}</textarea>
                        <small class="mt-2 text-xs text-red-500">
                            {{ $errors->first('description') }}</small>
                    </div>
                    <div class="flex-1">
                        <input type="file" name="image"
                            class="w-full text-gray-700 border border-gray-300 @error('image') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500">
                        <small class="mt-2 text-xs text-red-500">
                            {{ $errors->first('image') }}</small>
                    </div>
                    <div class="flex-2">
                        <select name="status"
                            class="w-full p-2 text-gray-700 border border-gray-300 @error('status') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                            required>
                            <option value="{{ $ormawa->status }}">{{ $ormawa->status == 1 ? 'Aktif' : 'Tidak aktif' }}
                            </option>
                            <option value="{{ $ormawa->status == 1 ? 0 : 1 }}">{{ $ormawa->status == 1 ? 'Tidak aktif' : 'Aktif' }}
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
            <div class="w-full md:w-1/4 order-1 md:order-none">
                <img src="{{ asset($ormawa->image) }}" alt="{{ $ormawa->title }}"
                    class="rounded-lg border-4 border-white shadow">
            </div>
        </div>

    </div>
@endsection
