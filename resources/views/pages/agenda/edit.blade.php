@extends('layouts.dashboard')

@section('content')
    <div class="flex items-center gap-5 md:gap-10">
        <div class="w-full md:w-2/3 space-y-5">
            <div class="space-y-2 mt-4">
                <a href="{{ route('agenda.index') }}"
                    class="inline-block text-sm bg-slate-100 hover:bg-slate-200 text-slate-900 px-4 py-2 rounded-lg mb-2">
                    <i class="fa-solid fa-circle-chevron-left"></i>
                    <span>Kembali</span>
                </a>
                <div class="space-y-2">
                    <a href="{{ route('agenda.index') }}">
                        <h1 class="font-bold text-2xl">Edit agenda {{ $agenda->title }}</h1>
                    </a>
                    <p class="text-gray-500 text-sm">Fitur agenda adalah gambar yang dapat digunakan pada halaman depan untuk
                        menyampaikan informasi atau iklan. Ini adalah cara yang berguna dan nyaman untuk memperbarui konten
                        tanpa
                        harus mengubah bagian lain dari halaman.</p>
                </div>
            </div>
            <form action="{{ route('agenda.update', $agenda->id) }}" class="w-full space-y-2" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="w-full">
                    <label for="title" class="block mb-1 text-sm font-medium text-gray-900">Judul</label>
                    <input type="text" name="title" id="title" value="{{ $agenda->title }}"
                        class="bg-gray-50 border border-gray-300 @error('title') border-red-500 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Tulis nama agenda disini.." required>
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('title') }}
                    </small>
                </div>
                <div class="w-full">
                    <label for="date" class="block mb-1 text-sm font-medium text-gray-900">Tanggal</label>
                    <input type="date" name="date" id="date" value="{{ $agenda->date }}"
                        class="bg-gray-50 border border-gray-300 @error('date') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('date') }}
                    </small>
                </div>
                <div class="w-full">
                    <label class="block mb-1 text-sm font-medium text-gray-900" for="image">Upload Poster</label>
                    <input
                        class="bg-gray-50 border border-gray-300 @error('status') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        id="image" type="file" name="image">
                    <div class="mt-1 text-xs text-gray-500">
                        <span class="font-bold">Ketentuan:</span>
                        <span>Ukuran gambar dimensi 4:5 (1MB)</span>
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
                        <option value="{{ $agenda->status }}">{{ $agenda->status == 1 ? 'Aktif' : 'Tidak aktif' }}
                        </option>
                        <option value="{{ $agenda->status == 1 ? 0 : 1 }}">
                            {{ $agenda->status == 1 ? 'Tidak aktif' : 'Aktif' }}
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
            <img loading="lazy" src="{{ asset($agenda->image) }}" alt="{{ $agenda->title }}"
                class="rounded-lg border-4 border-white shadow">
        </div>
    </div>
@endsection
