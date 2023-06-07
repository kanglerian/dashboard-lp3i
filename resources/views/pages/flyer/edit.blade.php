@extends('layouts.dashboard')

@section('content')
    <div class="flex-1 overflow-x-auto px-2">
        <div class="space-y-2">
            <a href="{{ route('flyer.index') }}" class="inline-block text-sm bg-slate-100 text-slate-900 px-4 py-2 rounded-lg mb-2"><span><i class="fa-solid fa-circle-chevron-left"></i></span> Kembali</a>
            <a href="{{ route('flyer.index') }}">
                <h1 class="font-bold text-2xl">{{ $flyer->headline }}</h1>
            </a>
            <p class="text-gray-500 text-sm">{{ $flyer->paragraph }}</p>
        </div>
        <div class="flex flex-col md:flex-row gap-5 mt-5">
            <div class="w-full md:w-1/2 order-2 md:order-none">
                <form action="{{ route('flyer.update', $flyer->id) }}" class="flex flex-col gap-2" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="flex-1">
                        <input type="text" name="headline" value="{{ $flyer->headline }}"
                            class="w-full p-2 text-gray-700 border border-gray-300 @error('headline') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Tulis headline disini..">
                        <small class="mt-2 text-xs text-red-500">
                            {{ $errors->first('headline') }}</small>
                    </div>
                    <div class="flex-1">
                        <input type="text" name="paragraph" value="{{ $flyer->paragraph }}"
                            class="w-full p-2 text-gray-700 border border-gray-300 @error('paragraph') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Tulis headline disini..">
                        <small class="mt-2 text-xs text-red-500">
                            {{ $errors->first('paragraph') }}</small>
                    </div>
                    <div class="flex-1">
                        <input type="file" name="image"
                            class="w-full text-gray-700 border border-gray-300 @error('image') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500">
                        <small class="mt-2 text-xs text-red-500">
                            {{ $errors->first('image') }}</small>
                    </div>
                    <div>
                        <button type="submit" class="bg-cyan-600 text-white text-sm py-2 px-3 rounded-md"><i
                                class="fa-solid fa-floppy-disk"></i> <span id="btnSubmit">Simpan perubahan</span></button>
                    </div>
                    <input type="hidden" value="{{ $flyer->status }}" name="status">
                </form>
            </div>
            <div class="w-full md:w-1/2 order-1 md:order-none">
                <img src="{{ asset($flyer->image) }}" alt="{{ $flyer->title }}"
                    class="rounded-lg border-4 border-white shadow">
            </div>
        </div>

    </div>
@endsection
