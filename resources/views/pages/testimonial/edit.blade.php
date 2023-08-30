@extends('layouts.dashboard')

@section('content')
<div class="flex items-center gap-5 md:gap-10">
    <div class="w-full md:w-2/3 space-y-5">
        <div class="space-y-2 mt-4">
            <a href="{{ route('programalumni.index') }}"
                class="inline-block text-sm bg-slate-100 hover:bg-slate-200 text-slate-900 px-4 py-2 rounded-lg mb-2">
                <i class="fa-solid fa-circle-chevron-left"></i>
                <span>Kembali</span>
            </a>
            <div class="space-y-2">
                <a href="{{ route('programalumni.index') }}">
                    <h1 class="font-bold text-2xl">Edit Testimoni {{ $alumni->level }} {{ $alumni->name }}</h1>
                </a>
                <p class="text-gray-500 text-sm">Fitur informasi adalah konten yang dapat digunakan pada halaman depan
                    untuk menyampaikan berbagai macam informasi berupa video. Ini adalah cara yang berguna dan nyaman
                    untuk memperbarui konten tanpa harus mengubah bagian lain dari halaman.</p>
            </div>
        </div>
        <form action="{{ route('programalumni.update', $alumni->id) }}" class="w-full space-y-2" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="w-full">
                <label for="name" class="block mb-1 text-sm font-medium text-gray-900">Nama lengkap</label>
                <input type="text" name="name" id="name" value="{{ $alumni->name }}"
                    class="bg-gray-50 border border-gray-300 @error('name') border-red-500 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Tulis nama alumni disini.." required>
                <small class="mt-2 text-xs text-red-500">
                    {{ $errors->first('name') }}
                </small>
            </div>
            <div class="w-full">
                <label for="school" class="block mb-1 text-sm font-medium text-gray-900">Asal sekolah</label>
                <input type="text" name="school" id="school" value="{{ $alumni->school }}"
                    class="bg-gray-50 border border-gray-300 @error('school') border-red-500 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Tulis nama sekolah disini.." required>
                <small class="mt-2 text-xs text-red-500">
                    {{ $errors->first('school') }}
                </small>
            </div>
            <div class="w-full">
                <label for="work" class="block mb-1 text-sm font-medium text-gray-900">Tempat bekerja</label>
                <input type="text" name="work" id="work" value="{{ $alumni->work }}"
                    class="bg-gray-50 border border-gray-300 @error('work') border-red-500 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Tulis nama perusahaan tempat bekerja disini.." required>
                <small class="mt-2 text-xs text-red-500">
                    {{ $errors->first('work') }}
                </small>
            </div>
            <div class="w-full">
                <label for="profession" class="block mb-1 text-sm font-medium text-gray-900">Profesi</label>
                <input type="text" name="profession" id="profession" value="{{ $alumni->profession }}"
                    class="bg-gray-50 border border-gray-300 @error('profession') border-red-500 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Tulis nama profesi disini.." required>
                <small class="mt-2 text-xs text-red-500">
                    {{ $errors->first('profession') }}
                </small>
            </div>
            <div class="w-full">
                <label for="year" class="block mb-1 text-sm font-medium text-gray-900">Alumni lulus</label>
                <input type="year" name="year" id="year" value="{{ $alumni->year }}"
                    class="bg-gray-50 border border-gray-300 @error('year') border-red-500 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Tulis tahun lulus disini.." required>
                <small class="mt-2 text-xs text-red-500">
                    {{ $errors->first('year') }}
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
                <label for="quote" class="block mb-1 text-sm font-medium text-gray-900">Quote</label>
                <textarea name="quote" id="quote" value="{{ $alumni->quote }}"
                    class="bg-gray-50 border border-gray-300 @error('quote') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Isi quote disini..." required>{{ $alumni->quote }}</textarea>
                <small class="mt-2 text-xs text-red-500">
                    {{ $errors->first('quote') }}
                </small>
            </div>
            <div class="w-full">
                <label for="uuid" class="block mb-1 text-sm font-medium text-gray-900">Program Studi</label>
                <select name="uuid" id="uuid"
                    class="bg-gray-50 border border-gray-300 @error('uuid') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required>
                    <option value="{{ $alumni->uuid }}">{{ $alumni->program->title }}</option>
                    @foreach ($programs as $program)
                        <option value="{{ $program->uuid }}">{{ $program->title }}</option>
                    @endforeach
                </select>
                <small class="mt-2 text-xs text-red-500">
                    {{ $errors->first('uuid') }}
                </small>
            </div>
            <div class="w-full">
                <label for="career" class="block mb-1 text-sm font-medium text-gray-900">Karir</label>
                <select name="career" id="career"
                    class="bg-gray-50 border border-gray-300 @error('career') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required>
                    @switch($alumni->career)
                        @case('M')
                            <option value="{{ $alumni->career }}">Magang
                            @break

                            @case('K')
                            <option value="{{ $alumni->career }}">Kerja
                            @break

                            @case('W')
                            <option value="{{ $alumni->career }}">Wirausaha
                            @break

                            @case('T')
                            <option value="{{ $alumni->career }}">Tidak bekerja
                            @break
                        @endswitch
                    </option>
                    <option value="M">Magang</option>
                    <option value="K">Kerja</option>
                    <option value="W">Wirausaha</option>
                    <option value="T">Tidak bekerja</option>
                </select>
                <small class="mt-2 text-xs text-red-500">
                    {{ $errors->first('career') }}
                </small>
            </div>
            <div class="w-full">
                <label for="testimoni" class="block mb-1 text-sm font-medium text-gray-900">Testimoni</label>
                <select name="testimoni" id="testimoni"
                    class="bg-gray-50 border border-gray-300 @error('testimoni') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required>
                    <option value="{{ $alumni->testimoni }}">
                        {{ $alumni->testimoni == 1 ? 'Aktif' : 'Tidak aktif' }}
                    </option>
                    <option value="{{ $alumni->testimoni == 1 ? 0 : 1 }}">
                        {{ $alumni->testimoni == 1 ? 'Tidak aktif' : 'Aktif' }}
                    </option>
                </select>
                <small class="mt-2 text-xs text-red-500">
                    {{ $errors->first('testimoni') }}
                </small>
            </div>
            <div class="w-full">
                <label for="status" class="block mb-1 text-sm font-medium text-gray-900">Status</label>
                <select name="status" id="status"
                    class="bg-gray-50 border border-gray-300 @error('status') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required>
                    <option value="{{ $alumni->status }}">{{ $alumni->status == 1 ? 'Aktif' : 'Tidak aktif' }}
                    </option>
                    <option value="{{ $alumni->status == 1 ? 0 : 1 }}">
                        {{ $alumni->status == 1 ? 'Tidak aktif' : 'Aktif' }}
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
        <img loading="lazy" src="{{ asset($alumni->image) }}" alt="{{ $alumni->title }}"
            class="rounded-lg border-4 border-white shadow">
    </div>
</div>
@endsection
