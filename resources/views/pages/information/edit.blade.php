@extends('layouts.dashboard')

@section('content')
    <div class="flex items-center gap-5 md:gap-10">
        <div class="w-full md:w-1/2 space-y-5">
            <div class="space-y-2 mt-4">
                <a href="{{ route('information.index') }}"
                    class="inline-block text-sm bg-slate-100 hover:bg-slate-200 text-slate-900 px-4 py-2 rounded-lg mb-2">
                    <i class="fa-solid fa-circle-chevron-left"></i>
                    <span>Kembali</span>
                </a>
                <div class="space-y-2">
                    <a href="{{ route('information.index') }}">
                        <h1 class="font-bold text-2xl">Edit Informasi {{ $information->title }}</h1>
                    </a>
                    <p class="text-gray-500 text-sm">Fitur informasi adalah konten yang dapat digunakan pada halaman depan
                        untuk menyampaikan berbagai macam informasi berupa video. Ini adalah cara yang berguna dan nyaman
                        untuk memperbarui konten tanpa harus mengubah bagian lain dari halaman.</p>
                </div>
            </div>
            <form action="{{ route('information.update', $information->id) }}" class="w-full space-y-2" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="w-full">
                    <label for="title" class="block mb-1 text-sm font-medium text-gray-900">Judul Informasi</label>
                    <input type="text" name="title" id="title" value="{{ $information->title }}"
                        class="bg-gray-50 border border-gray-300 @error('title') border-red-500 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Tulis judul informasi disini.." required>
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('title') }}
                    </small>
                </div>
                <div class="w-full">
                    <label for="youtube" class="block mb-1 text-sm font-medium text-gray-900">ID Video Youtube</label>
                    <input type="text" name="youtube" id="youtube" value="{{ $information->youtube }}"
                        class="bg-gray-50 border border-gray-300 @error('youtube') border-red-500 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Tulis ID video youtube disini.." required>
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('youtube') }}
                    </small>
                </div>
                <div class="w-full">
                    <label for="locate" class="block mb-1 text-sm font-medium text-gray-900">Pilih lokasi</label>
                    <select name="locate" id="locate"
                        class="bg-gray-50 border border-gray-300 @error('locate') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                        <option value="{{ $information->locate }}">
                            @switch($information->locate)
                                @case('L')
                                    {{ 'Landing Page' }}
                                @break

                                @case('C')
                                    {{ 'Career Center' }}
                                @break

                                @case('U')
                                    {{ 'UPPM' }}
                                @break
                            @endswitch
                        </option>
                        <option value="L">Landing Page</option>
                        <option value="C">Career Center</option>
                        <option value="U">UPPM</option>
                    </select>
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('locate') }}
                    </small>
                </div>
                <div class="w-full">
                    <label for="description" class="block mb-1 text-sm font-medium text-gray-900">Deskripsi</label>
                    <textarea name="description" id="description" value="{{ $information->description }}"
                        class="bg-gray-50 border border-gray-300 @error('description') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Isi deskripsi disini..." required>{{ $information->description }}</textarea>
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('description') }}
                    </small>
                </div>
                <div class="w-full">
                    <label for="status" class="block mb-1 text-sm font-medium text-gray-900">Status</label>
                    <select name="status" id="status"
                        class="bg-gray-50 border border-gray-300 @error('status') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                        <option value="{{ $information->status }}">
                            {{ $information->status == 1 ? 'Aktif' : 'Tidak aktif' }}
                        </option>
                        <option value="{{ $information->status == 1 ? 0 : 1 }}">
                            {{ $information->status == 1 ? 'Tidak aktif' : 'Aktif' }}
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
            <iframe class="rounded-lg w-full h-[350px]" src="https://www.youtube.com/embed/{{ $information->youtube }}"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
        </div>
    </div>
@endsection
