@extends('layouts.dashboard')

@section('content')
<div class="flex items-center gap-5 md:gap-10">
    <div class="w-full md:w-2/3 space-y-5">
        <div class="space-y-2 mt-4">
            <a href="{{ route('flyer.index') }}"
                class="inline-block text-sm bg-slate-100 hover:bg-slate-200 text-slate-900 px-4 py-2 rounded-lg mb-2">
                <i class="fa-solid fa-circle-chevron-left"></i>
                <span>Kembali</span>
            </a>
            <div class="space-y-2">
                <a href="{{ route('flyer.index') }}">
                    <h1 class="font-bold text-2xl">{{ $flyer->headline }}</h1>
                </a>
                <p class="text-gray-500 text-sm">{{ $flyer->paragraph }}</p>
            </div>
        </div>
        <form action="{{ route('flyer.update', $flyer->id) }}" class="w-full space-y-2" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="w-full">
                <label for="headline" class="block mb-1 text-sm font-medium text-gray-900">Judul</label>
                <input type="text" name="headline" id="headline" value="{{ $flyer->headline }}"
                    class="bg-gray-50 border border-gray-300 @error('headline') border-red-500 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Tulis headline disini.." required>
                <small class="mt-2 text-xs text-red-500">
                    {{ $errors->first('headline') }}
                </small>
            </div>
            <div class="w-full">
                <label for="paragraph" class="block mb-1 text-sm font-medium text-gray-900">Deskripsi</label>
                <textarea name="paragraph" id="paragraph" value="{{ $flyer->paragraph }}"
                    class="bg-gray-50 border border-gray-300 @error('paragraph') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Isi deskripsi disini..."
                    required>{{ $flyer->paragraph }}</textarea>
                <small class="mt-2 text-xs text-red-500">
                    {{ $errors->first('paragraph') }}
                </small>
            </div>
            <div class="w-full">
                <label for="location" class="block mb-1 text-sm font-medium text-gray-900">Pilih lokasi</label>
                <select type="text" name="location" id="location"
                    class="bg-gray-50 border border-gray-300 @error('location') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required>
                    <option value="{{ $flyer->location }}">
                        @switch($flyer->location)
                            @case('R')
                                {{ 'Kelas Reguler' }}
                            @break

                            @case('K')
                                {{ 'Kelas Karyawan' }}
                            @break
                        @endswitch
                    </option>
                    <option value="R">Kelas Reguler</option>
                    <option value="K">Kelas Karyawan</option>
                </select>
                <small class="mt-2 text-xs text-red-500">
                    {{ $errors->first('location') }}
                </small>
            </div>
            <div class="w-full">
                <label class="block mb-1 text-sm font-medium text-gray-900" for="image">Upload Poster</label>
                <input
                    class="bg-gray-50 border border-gray-300 @error('status') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    id="image" type="file" name="image">
                <div class="mt-1 text-xs text-gray-500">
                    <span class="font-bold">Ketentuan:</span>
                    <span>Ukuran gambar dimensi 16:9 (1MB)</span>
                </div>
                <small class="mt-2 text-xs text-red-500">
                    {{ $errors->first('image') }}
                </small>
            </div>
            
            <div class="w-full">
                <label for="status" class="block mb-1 text-sm font-medium text-gray-900">Status</label>
                <select type="text" name="status" id="status"
                    class="bg-gray-50 border border-gray-300 @error('status') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required>
                    <option value="{{ $flyer->status }}">{{ $flyer->status == 1 ? 'Aktif' : 'Tidak aktif' }}
                    </option>
                    <option value="{{ $flyer->status == 1 ? 0 : 1 }}">
                        {{ $flyer->status == 1 ? 'Tidak aktif' : 'Aktif' }}
                    </option>
                </select>
                <small class="mt-2 text-xs text-red-500">
                    {{ $errors->first('status') }}
                </small>
            </div>

            <button type="submit" class="mt-3 bg-cyan-600 text-white text-sm py-2 px-3 rounded-md">
                <i class="fa-solid fa-floppy-disk"></i>
                <span id="btnSubmit">Simpan perubahan</span>
            </button>
        </form>
    </div>
    <div class="w-full md:w-1/3 order-1 md:order-none">
        <img loading="lazy" src="{{ asset($flyer->image) }}" alt="{{ $flyer->title }}"
            class="rounded-lg border-4 border-white shadow">
    </div>
</div>
@endsection
    