@extends('layouts.dashboard')

@section('content')
    <div class="flex-1 overflow-x-auto px-2">
        <div class="space-y-2 mb-2">
            <a href="banner">
                <h1 class="font-bold text-2xl">Luaran PKM</h1>
            </a>
            <p class="text-gray-500 text-sm">Fitur spanduk adalah gambar yang dapat digunakan pada halaman depan untuk
                menyampaikan informasi atau iklan. Ini adalah cara yang berguna dan nyaman untuk memperbarui konten tanpa
                harus mengubah bagian lain dari halaman.</p>
            <span role="button" onclick="copyLinkAPI('/api/luaranpkmuppm')"
                class="inline-block text-sm rounded-lg text-sky-600 bg-slate-200 px-5 py-2"><i class="fa-solid fa-link"></i>
                <span id="linkAPI">/api/luaranpkmuppm</span></span>
        </div>
        <form action="{{ route('luaranpkmuppm.store') }}" class="flex flex-col md:flex-row md:items-start gap-4 py-3"
            method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex-1 space-y-2">
                <div>
                    <input type="text" name="title"
                        class="w-full p-2 text-gray-700 border border-gray-300 @error('title') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Tulis judul disini..">
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('title') }}</small>
                </div>
                <div>
                    <input type="number" name="year"
                        class="w-full p-2 text-gray-700 border border-gray-300 @error('year') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Tulis tahun disini..">
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('year') }}</small>
                </div>
            </div>
            <div class="flex-1 space-y-1">
                <div>
                    <input type="text" name="link"
                        class="w-full p-2 text-gray-700 border border-gray-300 @error('link') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Tulis link disini..">
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('link') }}</small>
                </div>
                <div>
                    <input type="hidden" name="type" value="PKM">
                    <select name="status"
                        class="w-full p-2 text-gray-700 border border-gray-300 @error('status') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                        required>
                        <option>Pilih</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak aktif</option>
                    </select>
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('status') }}</small>
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

        <div class="relative overflow-x-auto h-screen border border-gray-300 rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="md:w-1/12 px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="md:w-3/12 px-6 py-3">
                            Judul
                        </th>
                        <th scope="col" class="md:w-3/12 px-6 py-3">
                            Tahun
                        </th>
                        <th scope="col" class="md:w-2/12 px-6 py-3">
                            Link
                        </th>
                        <th scope="col" class="md:w-2/12 px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($luaran_uppms as $number => $uppm)
                        <tr class="bg-white border-b transition ease-in-out duration-200 hover:bg-gray-50">
                            <td class="px-6 py-4">
                                {{ $number + 1 }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $uppm->title }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $uppm->year }}
                            </td>
                            <td class="px-6 py-4">
                                @if (strpos($uppm->link, 'https') === 0)
                                    <a href="{{ $uppm->link }}" target="_blank"
                                        class="bg-lp3i-100 hover:bg-lp3i-200 px-3 py-1 rounded-lg text-white">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                @else
                                    {{ $uppm->link }}
                                @endif
                            </td>
                            <td class="space-y-2 px-6 py-4">
                                <!-- Toggle -->
                                <form action="{{ route('luaranpkmuppm.update', $uppm->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="title" value="{{ $uppm->title }}">
                                    <input type="hidden" name="type" value="{{ $uppm->type }}">
                                    <input type="hidden" name="year" value="{{ $uppm->year }}">
                                    <input type="hidden" name="link" value="{{ $uppm->link }}">
                                    <input type="hidden" name="status" value="{{ $uppm->status == 1 ? 0 : 1 }}">
                                    <button role="button" type="submit"
                                        class="w-full md:w-auto block md:inline text-center text-white px-2 py-1 text-sm rounded {{ $uppm->status == 1 ? 'bg-blue-500' : 'bg-red-500' }}">{!! $uppm->status == 1
                                            ? '<i class="fa-solid fa-toggle-on fa-1x"></i>'
                                            : '<i class="fa-solid fa-toggle-off fa-1x"></i>' !!}</button>
                                </form>
                                <!-- Edit -->
                                <button
                                    class="w-full md:w-auto block md:inline text-center bg-amber-400 px-2 py-1 text-sm rounded text-white"><a
                                        href="{{ route('luaranpkmuppm.edit', $uppm->id) }}"><i
                                            class="fa-regular fa-pen-to-square"></i></a></button>
                                <!-- Delete -->
                                <button role="button" data-modal-target="popup-modal{{ $uppm->id }}"
                                    data-modal-toggle="popup-modal{{ $uppm->id }}"
                                    class="w-full md:w-auto block md:inline text-center bg-red-600 px-2 py-1 text-sm rounded text-white"><i
                                        class="fa-solid fa-trash"></i></button>
                                <div id="popup-modal{{ $uppm->id }}" tabindex="-1"
                                    class="hidden fixed top-0 left-0 right-0 z-50 p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                    <div class="relative w-full h-full max-w-md md:h-auto">
                                        <div class="relative bg-white rounded-lg shadow">
                                            <button type="button"
                                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                                data-modal-hide="popup-modal{{ $uppm->id }}">
                                                <i class="fa-solid fa-xmark"></i>
                                            </button>
                                            <div class="flex flex-col p-6 text-center">
                                                <i
                                                    class="block mb-5 text-gray-500 fa-solid fa-circle-exclamation fa-3x"></i>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500">Kamu yakin akan
                                                    menghapus
                                                    {{ $uppm->title }}?
                                                </h3>
                                                <div class="flex justify-center gap-2">
                                                    <form action="{{ route('luaranpkmuppm.destroy', $uppm->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button role="button"
                                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                            Ya, tentu saja!
                                                        </button>
                                                    </form>
                                                    <button data-modal-hide="popup-modal{{ $uppm->id }}"
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
                            <td colspan="5" class="text-center px-6 py-4">Data belum tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
