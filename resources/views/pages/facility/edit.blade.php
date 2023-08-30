@extends('layouts.dashboard')

@section('content')
<div class="flex items-center gap-5 md:gap-10">
    <div class="w-full md:w-1/2 space-y-5">
        <div class="space-y-2 mt-4">
            <a href="{{ route('facility.index') }}"
                class="inline-block text-sm bg-slate-100 hover:bg-slate-200 text-slate-900 px-4 py-2 rounded-lg mb-2">
                <i class="fa-solid fa-circle-chevron-left"></i>
                <span>Kembali</span>
            </a>
            <div class="space-y-2">
                <a href="{{ route('facility.index') }}">
                    <h1 class="font-bold text-2xl">Edit Fasilitas {{ $facility->title }}</h1>
                </a>
                <p class="text-gray-500 text-sm">Fitur fasilitas adalah konten yang dapat digunakan pada halaman depan untuk menyampaikan berbagai macam fasilitas yang ada di LP3I. Ini adalah cara yang berguna dan nyaman untuk memperbarui konten tanpa harus mengubah bagian lain dari halaman.</p>
            </div>
        </div>
        <form action="{{ route('facility.update', $facility->id) }}" class="w-full space-y-2" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="w-full">
                <label for="title" class="block mb-1 text-sm font-medium text-gray-900">Judul</label>
                <input type="text" name="title" id="title" value="{{ $facility->title }}"
                    class="bg-gray-50 border border-gray-300 @error('title') border-red-500 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Tulis nama agenda disini.." required>
                <small class="mt-2 text-xs text-red-500">
                    {{ $errors->first('title') }}
                </small>
            </div>
            <div class="w-full">
                <label class="block mb-1 text-sm font-medium text-gray-900" for="image">Upload Foto</label>
                <input
                    class="bg-gray-50 border border-gray-300 @error('image') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    id="image" type="file" name="image">
                <div class="mt-1 text-xs text-gray-500">
                    <span class="font-bold">Ketentuan:</span>
                    <span>Ukuran maksimal 1MB</span>
                </div>
                <small class="mt-2 text-xs text-red-500">
                    {{ $errors->first('image') }}
                </small>
            </div>
            <div class="w-full">
                <label for="status" class="block mb-1 text-sm font-medium text-gray-900">Status</label>
                <select name="status" id="status"
                    class="bg-gray-50 border border-gray-300 @error('status') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required>
                    <option value="{{ $facility->status }}">{{ $facility->status == 1 ? 'Aktif' : 'Tidak aktif' }}
                    </option>
                    <option value="{{ $facility->status == 1 ? 0 : 1 }}">
                        {{ $facility->status == 1 ? 'Tidak aktif' : 'Aktif' }}
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
    <div class="w-full md:w-1/2 order-1 md:order-none">
        <img loading="lazy" src="{{ asset($facility->image) }}" alt="{{ $facility->title }}"
            class="rounded-lg border-4 border-white shadow">
    </div>
</div>
@endsection
