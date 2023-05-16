@extends('layouts.dashboard')

@section('content')
    <div class="flex-1 overflow-x-auto px-2">
        <div class="space-y-2">
            <a href="{{ route('programalumni.index') }}"
                class="inline-block text-sm bg-slate-100 text-slate-900 px-4 py-2 rounded-lg mb-2"><span><i
                        class="fa-solid fa-circle-chevron-left"></i></span> Kembali</a>
            <a href="{{ route('program.index') }}">
                <h1 class="font-bold text-2xl">Edit Testimoni {{ $alumni->level }} {{ $alumni->name }}</h1>
            </a>
            <p class="text-gray-500 text-sm">Fitur program studi adalah konten yang dapat digunakan pada halaman depan untuk menyampaikan berbagai macam program studi yang ada di LP3I. Ini adalah cara yang berguna dan nyaman untuk memperbarui konten tanpa harus mengubah bagian lain dari halaman.</p>
        </div>
        <div class="flex flex-col md:flex-row gap-5 mt-5">
            <div class="w-full md:w-2/4 order-2 md:order-none">
                <form action="{{ route('programalumni.update', $alumni->id) }}" class="flex flex-col gap-2" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="flex-1">
                        <input type="text" name="name" value="{{ $alumni->name }}"
                            class="w-full p-2 text-gray-700 border border-gray-300 @error('name') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Tulis nama lengkap disini..">
                        <small class="mt-2 text-xs text-red-500">
                            {{ $errors->first('name') }}</small>
                    </div>
                    <div class="flex-1">
                        <input type="text" name="school" value="{{ $alumni->school }}"
                            class="w-full p-2 text-gray-700 border border-gray-300 @error('school') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Tulis asal sekolah disini..">
                        <small class="mt-2 text-xs text-red-500">
                            {{ $errors->first('school') }}</small>
                    </div>
                    <div class="flex-1">
                        <input type="text" name="work" value="{{ $alumni->work }}"
                            class="w-full p-2 text-gray-700 border border-gray-300 @error('work') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Tulis tempat bekerja disini..">
                        <small class="mt-2 text-xs text-red-500">
                            {{ $errors->first('work') }}</small>
                    </div>
                    <div class="flex-1">
                        <input type="text" name="profession" value="{{ $alumni->profession }}"
                            class="w-full p-2 text-gray-700 border border-gray-300 @error('profession') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Tulis posisi bekerja disini..">
                        <small class="mt-2 text-xs text-red-500">
                            {{ $errors->first('profession') }}</small>
                    </div>
                    <div class="flex-1">
                        <input type="text" name="year" value="{{ $alumni->year }}"
                            class="w-full p-2 text-gray-700 border border-gray-300 @error('year') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Tulis tahun lulus disini..">
                        <small class="mt-2 text-xs text-red-500">
                            {{ $errors->first('year') }}</small>
                    </div>
                    <div class="flex-1">
                        <select name="uuid"
                            class="w-full p-2 text-gray-700 border border-gray-300 @error('uuid') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                            required>
                            <option value="{{ $alumni->uuid }}">{{ $alumni->program->title }}</option>
                            @foreach ($programs as $program)
                              <option value="{{ $program->uuid }}">{{ $program->title }}</option>
                            @endforeach
                        </select>
                        <small class="mt-2 text-xs text-red-500">
                            {{ $errors->first('uuid') }}</small>
                    </div>
                    <div class="flex-1">
                        <input type="file" name="image"
                            class="w-full text-gray-700 border border-gray-300 @error('image') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500">
                        <small class="mt-2 text-xs text-slate-600"><span class="font-bold">Ketentuan:</span> Ukuran gambar
                            dimensi
                            1:1 (1MB)</small>
                        <small class="mt-2 text-xs text-red-500">{{ $errors->first('image') }}</small>
                    </div>
                    <div class="flex-1">
                        <textarea type="text" name="quote" rows="5" value="{{ $alumni->quote }}"
                            class="w-full p-2 text-gray-700 border border-gray-300 @error('quote') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Tulis testimoni alumni disini..">{{ $alumni->quote }}</textarea>
                        <small class="mt-2 text-xs text-red-500">
                            {{ $errors->first('quote') }}</small>
                    </div>
                    <div class="flex-1">
                        <select name="testimoni"
                            class="w-full p-2 text-gray-700 border border-gray-300 @error('testimoni') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                            required>
                            <option value="{{ $alumni->testimoni }}">{{ $alumni->testimoni == 1 ? 'Aktif' : 'Tidak aktif' }}
                            </option>
                            <option value="{{ $alumni->testimoni == 1 ? 0 : 1 }}">
                                {{ $alumni->testimoni == 1 ? 'Tidak aktif' : 'Aktif' }}
                            </option>
                        </select>
                        <small class="mt-2 text-xs text-red-500">
                            {{ $errors->first('testimoni') }}</small>
                    </div>
                    <div class="flex-1">
                        <select name="status"
                            class="w-full p-2 text-gray-700 border border-gray-300 @error('status') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                            required>
                            <option value="{{ $alumni->status }}">{{ $alumni->status == 1 ? 'Aktif' : 'Tidak aktif' }}
                            </option>
                            <option value="{{ $alumni->status == 1 ? 0 : 1 }}">
                                {{ $alumni->status == 1 ? 'Tidak aktif' : 'Aktif' }}
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
            <div class="w-full md:w-2/4 order-1 md:order-none">
                <img src="{{ asset($alumni->image) }}" alt="{{ $alumni->title }}"
                    class="rounded-lg border-4 border-white shadow">
            </div>
        </div>

    </div>
@endsection
