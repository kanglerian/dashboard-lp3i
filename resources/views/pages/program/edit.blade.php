@extends('layouts.dashboard')

@section('content')
<div class="flex items-center gap-5 md:gap-10">
    <div class="w-full md:w-1/2 space-y-5">
        <div class="space-y-2 mt-4">
            <a href="{{ route('program.index') }}"
                class="inline-block text-sm bg-slate-100 hover:bg-slate-200 text-slate-900 px-4 py-2 rounded-lg mb-2">
                <i class="fa-solid fa-circle-chevron-left"></i>
                <span>Kembali</span>
            </a>
            <div class="space-y-2">
                <a href="{{ route('program.index') }}">
                    <h1 class="font-bold text-2xl">Edit Program {{ $program->level }} {{ $program->title }}</h1>
                </a>
                <p class="text-gray-500 text-sm">Fitur program studi adalah konten yang dapat digunakan pada halaman depan untuk menyampaikan berbagai macam program studi yang ada di LP3I. Ini adalah cara yang berguna dan nyaman untuk memperbarui konten tanpa harus mengubah bagian lain dari halaman.</p>
            </div>
        </div>
        <form action="{{ route('program.update', $program->id) }}" class="w-full space-y-2" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="w-full">
                <label for="title" class="block mb-1 text-sm font-medium text-gray-900">Judul</label>
                <input type="text" name="title" id="title" value="{{ $program->title }}"
                    class="bg-gray-50 border border-gray-300 @error('title') border-red-500 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Tulis nama agenda disini.." required>
                <small class="mt-2 text-xs text-red-500">
                    {{ $errors->first('title') }}
                </small>
            </div>
            <div class="w-full">
                <label for="campus" class="block mb-1 text-sm font-medium text-gray-900">Pilih kampus</label>
                <select name="campus" id="campus"
                    class="bg-gray-50 border border-gray-300 @error('campus') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required>
                    <option value="{{ $program->campus }}">{{ $program->campus }}</option>
                    <option value="Kampus Utama">Kampus Utama</option>
                    <option value="Politeknik LP3I Kampus Tasikmalaya">Politeknik LP3I Kampus Tasikmalaya</option>
                    <option value="LP3I Tasikmalaya">LP3I Tasikmalaya</option>
                </select>
                <small class="mt-2 text-xs text-red-500">
                    {{ $errors->first('campus') }}
                </small>
            </div>
            <div class="w-full">
                <label for="level" class="block mb-1 text-sm font-medium text-gray-900">Pilih jenjang</label>
                <select name="level" id="level"
                    class="bg-gray-50 border border-gray-300 @error('level') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required>
                    <option value="{{ $program->level }}">{{ $program->level }}</option>
                    <option value="D3">D3</option>
                    <option value="Vokasi 2 Tahun">Vokasi 2 Tahun</option>
                </select>
                <small class="mt-2 text-xs text-red-500">
                    {{ $errors->first('level') }}
                </small>
            </div>
            <div class="w-full">
                <label class="block mb-1 text-sm font-medium text-gray-900" for="image">Upload Gambar</label>
                <input
                    class="bg-gray-50 border border-gray-300 @error('image') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
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
                <select name="status" id="status"
                    class="bg-gray-50 border border-gray-300 @error('status') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required>
                    <option value="{{ $program->status }}">{{ $program->status == 1 ? 'Aktif' : 'Tidak aktif' }}
                    </option>
                    <option value="{{ $program->status == 1 ? 0 : 1 }}">
                        {{ $program->status == 1 ? 'Tidak aktif' : 'Aktif' }}
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
        <img loading="lazy" src="{{ asset($program->image) }}" alt="{{ $program->title }}"
            class="rounded-lg border-4 border-white shadow">
    </div>
</div>
@endsection
