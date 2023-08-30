@extends('layouts.dashboard')

@section('content')
    <div class="flex items-center gap-5 md:gap-10">
        <div class="w-full md:w-2/3 space-y-5">
            <div class="space-y-2 mt-4">
                <a href="{{ route('organization.index') }}"
                    class="inline-block text-sm bg-slate-100 hover:bg-slate-200 text-slate-900 px-4 py-2 rounded-lg mb-2">
                    <i class="fa-solid fa-circle-chevron-left"></i>
                    <span>Kembali</span>
                </a>
                <div class="space-y-2">
                    <a href="{{ route('organization.index') }}">
                        <h1 class="font-bold text-2xl">Edit Organisasi {{ $organization->title }}</h1>
                    </a>
                    <p class="text-gray-500 text-sm">Fitur organisasi adalah konten yang dapat digunakan pada halaman depan
                        untuk menyampaikan struktur organisasi di LP3I. Ini adalah cara yang berguna dan nyaman untuk
                        memperbarui konten tanpa harus mengubah bagian lain dari halaman.</p>
                </div>
            </div>
            <form action="{{ route('organization.update', $organization->id) }}" class="w-full space-y-2" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="w-full">
                    <label for="title" class="block mb-1 text-sm font-medium text-gray-900">Judul</label>
                    <input type="text" name="title" id="title" value="{{ $organization->title }}"
                        class="bg-gray-50 border border-gray-300 @error('title') border-red-500 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Tulis nama agenda disini.." required>
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('title') }}
                    </small>
                </div>
                <div class="w-full">
                    <label for="drawio" class="block mb-1 text-sm font-medium text-gray-900">Link Drawio</label>
                    <textarea name="drawio" id="drawio" value="{{ $organization->drawio }}"
                        class="bg-gray-50 border border-gray-300 @error('drawio') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Isi deskripsi disini..." required>{{ $organization->drawio }}</textarea>
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('drawio') }}
                    </small>
                </div>
                <div class="w-full">
                    <label for="status" class="block mb-1 text-sm font-medium text-gray-900">Status</label>
                    <select name="status" id="status"
                        class="bg-gray-50 border border-gray-300 @error('status') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                        <option value="{{ $organization->status }}">{{ $organization->status == 1 ? 'Aktif' : 'Tidak aktif' }}
                        </option>
                        <option value="{{ $organization->status == 1 ? 0 : 1 }}">
                            {{ $organization->status == 1 ? 'Tidak aktif' : 'Aktif' }}
                        </option>
                    </select>
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('status') }}
                    </small>
                </div>
                <button type="submit" class="mt-5 bg-cyan-600 text-white text-sm py-2 px-3 rounded-md">
                    <i class="fa-solid fa-floppy-disk"></i>
                    <span id="btnSubmit">Simpan perubahan</span>
                </button>
            </form>
        </div>
        <div class="w-full md:w-1/3 order-1 md:order-none">
            <div class="mxgraph" style="max-width:100%;border:1px solid transparent;"
                data-mxgraph="<?= $organization->drawio ?>"></div>
        </div>
    </div>
@endsection
