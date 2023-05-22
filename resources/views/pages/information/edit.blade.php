@extends('layouts.dashboard')

@section('content')
    <div class="flex-1 overflow-x-auto px-2">
        <div class="space-y-2">
            <a href="{{ route('information.index') }}" class="inline-block text-sm bg-slate-100 text-slate-900 px-4 py-2 rounded-lg mb-2"><span><i class="fa-solid fa-circle-chevron-left"></i></span> Kembali</a>
            <a href="{{ route('information.index') }}">
                <h1 class="font-bold text-2xl">Edit Informasi {{ $information->title }}</h1>
            </a>
            <p class="text-gray-500 text-sm">Fitur informasi adalah konten yang dapat digunakan pada halaman depan untuk menyampaikan berbagai macam informasi berupa video. Ini adalah cara yang berguna dan nyaman untuk memperbarui konten tanpa harus mengubah bagian lain dari halaman.</p>
        </div>
        <div class="flex flex-col md:flex-row gap-5 mt-5">
            <div class="w-full md:w-1/2 order-2 md:order-none">
                <form action="{{ route('information.update', $information->id) }}" class="flex flex-col gap-2" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="flex-1">
                        <input type="text" name="title" value="{{ $information->title }}"
                            class="w-full p-2 text-gray-700 border border-gray-300 @error('title') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Tulis judul disini..">
                        <small class="mt-2 text-xs text-red-500">
                            {{ $errors->first('title') }}</small>
                    </div>
                    <div class="flex-1">
                        <input type="text" name="youtube" value="{{ $information->youtube }}"
                            class="w-full p-2 text-gray-700 border border-gray-300 @error('youtube') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Tulis link youtube disini..">
                        <small class="mt-2 text-xs text-red-500">
                            {{ $errors->first('youtube') }}</small>
                    </div>
                    <div class="flex-1">
                        <select name="locate"
                            class="w-full p-2 text-gray-700 border border-gray-300 @error('locate') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                            required>
                            <option value="{{ $information->locate }}">
                                @switch($information->locate)
                                    @case('L')
                                        {{ 'Landing Page' }}
                                        @break
                                    @case('C')
                                        {{ 'Career Center' }}
                                        @break
                                @endswitch
                            </option>
                            <option value="L">Landing Page</option>
                            <option value="C">Career Center</option>
                        </select>
                        <small class="mt-2 text-xs text-red-500">
                            {{ $errors->first('locate') }}</small>
                    </div>
                    <div class="flex-1">
                        <textarea type="text" rows="10" name="description" value="{{ $information->description }}"
                            class="w-full p-2 text-gray-700 border border-gray-300 @error('description') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Tulis deskripsi disini..">{{ $information->description }}</textarea>
                        <small class="mt-2 text-xs text-red-500">
                            {{ $errors->first('description') }}</small>
                    </div>
                    <div>
                        <button type="submit" class="bg-cyan-600 text-white text-sm py-2 px-3 rounded-md"><i
                                class="fa-solid fa-floppy-disk"></i> <span id="btnSubmit">Simpan perubahan</span></button>
                    </div>
                </form>
            </div>
            <div class="w-full md:w-1/2 order-1 md:order-none">
                <iframe class="rounded-lg w-full h-full" src="https://www.youtube.com/embed/{{ $information->youtube }}"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
            </div>
        </div>

    </div>
@endsection
