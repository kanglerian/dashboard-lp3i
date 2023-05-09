@extends('layouts.dashboard')

@section('content')
    <div class="flex-1 overflow-x-auto px-2">
        <div class="space-y-2 mb-2">
            <a href="banner">
                <h1 class="font-bold text-2xl">Program Studi</h1>
            </a>
            <p class="text-gray-500 text-sm">Fitur program studi adalah konten yang dapat digunakan pada halaman depan untuk
                menyampaikan berbagai macam program studi yang ada di LP3I. Ini adalah cara yang berguna dan nyaman untuk
                memperbarui konten tanpa harus mengubah bagian lain dari halaman.</p>
            <span role="button" onclick="copyLinkAPI()"
                class="inline-block text-sm rounded-lg text-sky-600 bg-slate-200 px-5 py-2"><i class="fa-solid fa-link"></i>
                <span id="linkAPI">/api/programs</span></span>
        </div>
        <form action="{{ route('program.store') }}" class="flex flex-col md:flex-row md:items-start gap-4 py-3"
            method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex-1 space-y-2">
                <div>
                    <input type="text" name="title"
                        class="w-full p-2 text-gray-700 border border-gray-300 @error('title') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Tulis nama jurusan disini..">
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('title') }}</small>
                </div>
                <div>
                    <select name="campus"
                        class="w-full p-2 text-gray-700 border border-gray-300 @error('campus') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                        required>
                        <option>Pilih kampus</option>
                        <option value="Kampus Utama">Kampus Utama</option>
                        <option value="Politeknik LP3I Kampus Tasikmalaya">Politeknik LP3I Kampus Tasikmalaya</option>
                        <option value="LP3I Tasikmalaya">LP3I Tasikmalaya</option>
                    </select>
                </div>
            </div>
            <div class="flex-1 space-y-2">
                <div>
                    <select name="level"
                        class="w-full p-2 text-gray-700 border border-gray-300 @error('level') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                        required>
                        <option>Pilih jenjang</option>
                        <option value="D3">D3</option>
                        <option value="Vokasi 2 Tahun">Vokasi 2 Tahun</option>
                    </select>
                </div>
                <div>
                    <input type="file" name="image"
                        class="w-full text-gray-700 border border-gray-300 @error('image') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500">
                    <small class="mt-2 text-xs text-slate-600"><span class="font-bold">Ketentuan:</span> Ukuran gambar
                        dimensi
                        16:9 (1MB)</small>
                    <small class="mt-2 text-xs text-red-500">{{ $errors->first('image') }}</small>
                </div>
            </div>
            <div>
                <button type="submit" class="bg-cyan-600 text-white text-sm py-2 px-3 rounded-md"><i
                        class="fa-solid fa-floppy-disk"></i> <span id="btnSubmit">Simpan</span></button>
            </div>
        </form>

        @if (session('message'))
            <div id="alert" class="flex p-4 mb-4 bg-green-50 text-green-800 rounded-lg" role="alert">
                <i class="fa-solid fa-circle-check"></i>
                <div class="ml-3 text-sm font-medium">
                    {{ session('message') }}
                </div>
                <button type="button" class="ml-auto mr-2" data-dismiss-target="#alert" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        @endif

        <div class="relative overflow-x-auto border border-gray-300 rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="md:w-1/12 px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="md:w-4/12 px-3 py-3">
                            Gambar
                        </th>
                        <th scope="col" class="md:w-3/12 px-6 py-3">
                            Jurusan
                        </th>
                        <th scope="col" class="md:w-2/12 px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($programs as $number => $program)
                        <tr class="bg-white border-b transition ease-in-out duration-200 hover:bg-gray-50">
                            <td class="px-6 py-4">
                                {{ $number + 1 }}
                            </td>
                            <th scope="row" class="px-6 py-4">
                                <img src="{{ asset($program->image) }}" class="w-32 rounded">
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                                {{ $program->level }} {{ $program->title }}
                                <p class="text-gray-500 font-normal text-xs mt-2 text-justify">
                                    {{ $program->campus }}
                                </p>
                            </th>
                            <td colspan="3" class="space-y-2 px-6 py-4">
                                <a href="{{ route('program.show', $program->uuid) }}"
                                    class="mb-2 w-full md:w-auto block md:inline-block text-center bg-sky-500 px-2 py-1 text-sm rounded text-white"><i class="fa-solid fa-eye"></i></a>
                                <!-- Toggle -->
                                <form action="{{ route('program.update', $program->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="title" value="{{ $program->title }}">
                                    <input type="hidden" name="campus" value="{{ $program->campus }}">
                                    <input type="hidden" name="level" value="{{ $program->level }}">
                                    <input type="hidden" name="status" value="{{ $program->status == 1 ? 0 : 1 }}">
                                    <button role="button" type="submit"
                                        class="w-full md:w-auto block md:inline text-center text-white px-2 py-1 text-sm rounded {{ $program->status == 1 ? 'bg-blue-500' : 'bg-red-500' }}">{!! $program->status == 1
                                            ? '<i class="fa-solid fa-toggle-on fa-1x"></i>'
                                            : '<i class="fa-solid fa-toggle-off fa-1x"></i>' !!}</button>
                                </form>
                                <!-- Edit -->
                                <button
                                    class="w-full md:w-auto block md:inline-block text-center bg-amber-400 px-2 py-1 text-sm rounded text-white"><a
                                        href="{{ route('program.edit', $program->id) }}"><i
                                            class="fa-regular fa-pen-to-square"></i></a></button>
                                <!-- Delete -->
                                <button role="button" data-modal-target="popup-modal{{ $program->id }}"
                                    data-modal-toggle="popup-modal{{ $program->id }}"
                                    class="w-full md:w-auto block md:inline-block text-center bg-red-600 px-2 py-1 text-sm rounded text-white"><i
                                        class="fa-solid fa-trash"></i></button>
                                <div id="popup-modal{{ $program->id }}" tabindex="-1"
                                    class="hidden fixed top-0 left-0 right-0 z-50 p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                    <div class="relative w-full h-full max-w-md md:h-auto">
                                        <div class="relative bg-white rounded-lg shadow">
                                            <button type="button"
                                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                                data-modal-hide="popup-modal{{ $program->id }}">
                                                <i class="fa-solid fa-xmark"></i>
                                            </button>
                                            <div class="flex flex-col p-6 text-center">
                                                <i
                                                    class="block mb-5 text-gray-500 fa-solid fa-circle-exclamation fa-3x"></i>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500">Kamu yakin akan
                                                    menghapus
                                                    {{ $program->title }}?
                                                </h3>
                                                <div class="flex justify-center gap-2">
                                                    <form action="{{ route('program.destroy', $program->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button role="button"
                                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                            Ya, tentu saja!
                                                        </button>
                                                    </form>
                                                    <button data-modal-hide="popup-modal{{ $program->id }}"
                                                        type="button"
                                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Tidak,
                                                        batalkan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Toggle -->
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-white border-b">
                            <td colspan="6" class="text-center px-6 py-4">Data belum tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
