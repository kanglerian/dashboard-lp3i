@extends('layouts.dashboard')

@section('content')
    <div class="flex-1 overflow-x-auto px-2">
        <div class="space-y-2">
            <a href="{{ route('program.index') }}"
                class="inline-block text-sm bg-slate-100 text-slate-900 px-4 py-2 rounded-lg mb-2"><span><i
                        class="fa-solid fa-circle-chevron-left"></i></span> Kembali</a>
            <a href="{{ route('program.index') }}">
                <h1 class="font-bold text-2xl">Detail Program<br>{{ $program->level }} {{ $program->title }}</h1>
            </a>
            <p class="text-gray-500 text-sm">Fitur program studi adalah konten yang dapat digunakan pada halaman depan untuk
                menyampaikan berbagai macam program studi yang ada di LP3I. Ini adalah cara yang berguna dan nyaman untuk
                memperbarui konten tanpa harus mengubah bagian lain dari halaman.</p>
        </div>
        <div class="flex flex-col md:flex-row gap-5 mt-5">
            <div class="w-full md:w-2/4 order-2 md:order-none">
                <form action="{{ route('program.update', $program->id) }}" class="flex flex-col gap-2" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="flex-1">
                        <input type="text" name="title" value="{{ $program->title }}"
                            class="w-full p-2 text-gray-700 border border-gray-300 @error('title') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Tulis judul disini..">
                        <small class="mt-2 text-xs text-red-500">
                            {{ $errors->first('title') }}</small>
                    </div>
                    <div class="flex-1">
                        <select name="campus"
                            class="w-full p-2 text-gray-700 border border-gray-300 @error('campus') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                            required>
                            <option value="{{ $program->campus }}">{{ $program->campus }}</option>
                            <option value="Kampus Utama">Kampus Utama</option>
                            <option value="Politeknik LP3I Kampus Tasikmalaya">Politeknik LP3I Kampus Tasikmalaya</option>
                            <option value="LP3I Tasikmalaya">LP3I Tasikmalaya</option>
                        </select>
                        <small class="mt-2 text-xs text-red-500">
                            {{ $errors->first('campus') }}</small>
                    </div>
                    <div class="flex-1">
                        <select name="level"
                            class="w-full p-2 text-gray-700 border border-gray-300 @error('level') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                            required>
                            <option value="{{ $program->level }}">{{ $program->level }}</option>
                            <option value="D3">D3</option>
                            <option value="Vokasi 2 Tahun">Vokasi 2 Tahun</option>
                        </select>
                        <small class="mt-2 text-xs text-red-500">
                            {{ $errors->first('level') }}</small>
                    </div>
                    <div class="flex-1">
                        <input type="file" name="image"
                            class="w-full text-gray-700 border border-gray-300 @error('image') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500">
                        <small class="mt-2 text-xs text-slate-600"><span class="font-bold">Ketentuan:</span> Ukuran gambar
                            dimensi
                            16:9 (1MB)</small>
                        <small class="mt-2 text-xs text-red-500">{{ $errors->first('image') }}</small>
                    </div>
                    <div class="flex-1">
                        <select name="status"
                            class="w-full p-2 text-gray-700 border border-gray-300 @error('status') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                            required>
                            <option value="{{ $program->status }}">{{ $program->status == 1 ? 'Aktif' : 'Tidak aktif' }}
                            </option>
                            <option value="{{ $program->status == 1 ? 0 : 1 }}">
                                {{ $program->status == 1 ? 'Tidak aktif' : 'Aktif' }}
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
                <img src="{{ asset($program->image) }}" alt="{{ $program->title }}"
                    class="rounded-lg border-4 border-white shadow">
            </div>
        </div>
        <hr class="my-5">
        <div class="flex flex-col gap-2">
            <div class="flex-1">
                <form action="{{ route('programvision.store') }}"
                    class="flex flex-col md:flex-row md:items-start gap-4 py-3" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="flex-1 space-y-2">
                        <div>
                            <input type="hidden" name="uuid" value="{{ $program->uuid }}">
                            <input type="text" name="vision"
                                class="w-full p-2 text-gray-700 border border-gray-300 @error('vision') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Tulis visi jurusan disini..">
                            <small class="mt-2 text-xs text-red-500">
                                {{ $errors->first('vision') }}</small>
                        </div>
                    </div>
                    <div>
                        <span role="button" onclick="copyLinkAPI('/api/programvisions/{{ $program->uuid }}')"
                            class="inline-block text-sm rounded-lg text-sky-600 bg-slate-200 px-5 py-2"><i
                                class="fa-solid fa-link"></i> Salin API</span>
                        <button type="submit" class="bg-cyan-600 text-white text-sm py-2 px-3 rounded-md"><i
                                class="fa-solid fa-floppy-disk"></i> <span id="btnSubmit">Simpan</span></button>
                    </div>
                </form>

                @if (session('visi'))
                    <div id="alert" class="flex p-4 mb-4 bg-green-50 text-green-800 rounded-lg" role="alert">
                        <i class="fa-solid fa-circle-check"></i>
                        <div class="ml-3 text-sm font-medium">
                            {{ session('visi') }}
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
                                    Visi
                                </th>
                                <th scope="col" class="md:w-2/12 px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($visions as $no => $vision)
                                <tr class="bg-white border-b transition ease-in-out duration-200 hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        {{ $no + 1 }}
                                    </td>
                                    <th class="px-6 py-4 font-light">
                                        {{ $vision->vision }}
                                    </th>
                                    <td colspan="3" class="space-y-2 px-6 py-4">
                                        <form action="{{ route('programvision.update', $vision->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="uuid" value="{{ $vision->uuid }}">
                                            <input type="hidden" name="vision" value="{{ $vision->vision }}">
                                            <input type="hidden" name="status"
                                                value="{{ $vision->status == 1 ? 0 : 1 }}">
                                            <button role="button" type="submit"
                                                class="w-full md:w-auto block md:inline text-center text-white px-2 py-1 text-sm rounded {{ $vision->status == 1 ? 'bg-blue-500' : 'bg-red-500' }}">{!! $vision->status == 1
                                                    ? '<i class="fa-solid fa-toggle-on fa-1x"></i>'
                                                    : '<i class="fa-solid fa-toggle-off fa-1x"></i>' !!}</button>
                                        </form>
                                        <!-- Delete -->
                                        <button role="button" data-modal-target="popup-modal{{ $vision->id }}"
                                            data-modal-toggle="popup-modal{{ $vision->id }}"
                                            class="w-full md:w-auto block md:inline-block text-center bg-red-600 px-2 py-1 text-sm rounded text-white"><i
                                                class="fa-solid fa-trash"></i></button>
                                        <div id="popup-modal{{ $vision->id }}" tabindex="-1"
                                            class="hidden fixed top-0 left-0 right-0 z-50 p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                            <div class="relative w-full h-full max-w-md md:h-auto">
                                                <div class="relative bg-white rounded-lg shadow">
                                                    <button type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                                        data-modal-hide="popup-modal{{ $vision->id }}">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </button>
                                                    <div class="flex flex-col p-6 text-center">
                                                        <i
                                                            class="block mb-5 text-gray-500 fa-solid fa-circle-exclamation fa-3x"></i>
                                                        <h3 class="mb-5 text-lg font-normal text-gray-500">Kamu yakin akan
                                                            menghapus visi ini?
                                                        </h3>
                                                        <div class="flex justify-center gap-2">
                                                            <form
                                                                action="{{ route('programvision.destroy', $vision->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button role="button"
                                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                                    Ya, tentu saja!
                                                                </button>
                                                            </form>
                                                            <button data-modal-hide="popup-modal{{ $vision->id }}"
                                                                type="button"
                                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Tidak,
                                                                batalkan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
            <hr class="my-3">
            <div class="flex-1">
                <form action="{{ route('programmision.store') }}"
                    class="flex flex-col md:flex-row md:items-start gap-4 py-3" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="flex-1 space-y-2">
                        <div>
                            <input type="hidden" name="uuid" value="{{ $program->uuid }}">
                            <input type="text" name="mision"
                                class="w-full p-2 text-gray-700 border border-gray-300 @error('mision') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Tulis misi jurusan disini..">
                            <small class="mt-2 text-xs text-red-500">
                                {{ $errors->first('mision') }}</small>
                        </div>
                    </div>
                    <div>
                        <span role="button" onclick="copyLinkAPI('/api/programmisions/{{ $program->uuid }}')"
                            class="inline-block text-sm rounded-lg text-sky-600 bg-slate-200 px-5 py-2"><i
                                class="fa-solid fa-link"></i> Salin API</span>
                        <button type="submit" class="bg-cyan-600 text-white text-sm py-2 px-3 rounded-md"><i
                                class="fa-solid fa-floppy-disk"></i> <span id="btnSubmit">Simpan</span></button>
                    </div>
                </form>

                @if (session('misi'))
                    <div id="alert" class="flex p-4 mb-4 bg-green-50 text-green-800 rounded-lg" role="alert">
                        <i class="fa-solid fa-circle-check"></i>
                        <div class="ml-3 text-sm font-medium">
                            {{ session('misi') }}
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
                                    Misi
                                </th>
                                <th scope="col" class="md:w-2/12 px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($misions as $no => $mision)
                                <tr class="bg-white border-b transition ease-in-out duration-200 hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        {{ $no + 1 }}
                                    </td>
                                    <th class="px-6 py-4 font-light">
                                        {{ $mision->mision }}
                                    </th>
                                    <td colspan="3" class="space-y-2 px-6 py-4">
                                        <form action="{{ route('programmision.update', $mision->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="uuid" value="{{ $mision->uuid }}">
                                            <input type="hidden" name="mision" value="{{ $mision->mision }}">
                                            <input type="hidden" name="status"
                                                value="{{ $mision->status == 1 ? 0 : 1 }}">
                                            <button role="button" type="submit"
                                                class="w-full md:w-auto block md:inline text-center text-white px-2 py-1 text-sm rounded {{ $mision->status == 1 ? 'bg-blue-500' : 'bg-red-500' }}">{!! $mision->status == 1
                                                    ? '<i class="fa-solid fa-toggle-on fa-1x"></i>'
                                                    : '<i class="fa-solid fa-toggle-off fa-1x"></i>' !!}</button>
                                        </form>
                                        <!-- Delete -->
                                        <button role="button" data-modal-target="popup-modal{{ $mision->id }}"
                                            data-modal-toggle="popup-modal{{ $mision->id }}"
                                            class="w-full md:w-auto block md:inline-block text-center bg-red-600 px-2 py-1 text-sm rounded text-white"><i
                                                class="fa-solid fa-trash"></i></button>
                                        <div id="popup-modal{{ $mision->id }}" tabindex="-1"
                                            class="hidden fixed top-0 left-0 right-0 z-50 p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                            <div class="relative w-full h-full max-w-md md:h-auto">
                                                <div class="relative bg-white rounded-lg shadow">
                                                    <button type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                                        data-modal-hide="popup-modal{{ $mision->id }}">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </button>
                                                    <div class="flex flex-col p-6 text-center">
                                                        <i
                                                            class="block mb-5 text-gray-500 fa-solid fa-circle-exclamation fa-3x"></i>
                                                        <h3 class="mb-5 text-lg font-normal text-gray-500">Kamu yakin akan
                                                            menghapus misi ini?
                                                        </h3>
                                                        <div class="flex justify-center gap-2">
                                                            <form
                                                                action="{{ route('programmision.destroy', $mision->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button role="button"
                                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                                    Ya, tentu saja!
                                                                </button>
                                                            </form>
                                                            <button data-modal-hide="popup-modal{{ $mision->id }}"
                                                                type="button"
                                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Tidak,
                                                                batalkan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
        </div>
        <hr class="my-5">
        <div class="flex flex-col gap-2">
            <div class="flex-1">
                <form action="{{ route('programbenefit.store') }}"
                    class="flex flex-col md:flex-row md:items-start gap-4 py-3" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="flex-1 space-y-2">
                        <div>
                            <input type="hidden" name="uuid" value="{{ $program->uuid }}">
                            <input type="text" name="benefit"
                                class="w-full p-2 text-gray-700 border border-gray-300 @error('benefit') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Tulis keunggulan jurusan disini..">
                            <small class="mt-2 text-xs text-red-500">
                                {{ $errors->first('benefit') }}</small>
                        </div>
                    </div>
                    <div>
                        <span role="button" onclick="copyLinkAPI('/api/programbenefits/{{ $program->uuid }}')"
                            class="inline-block text-sm rounded-lg text-sky-600 bg-slate-200 px-5 py-2"><i
                                class="fa-solid fa-link"></i> Salin API</span>
                        <button type="submit" class="bg-cyan-600 text-white text-sm py-2 px-3 rounded-md"><i
                                class="fa-solid fa-floppy-disk"></i> <span id="btnSubmit">Simpan</span></button>
                    </div>
                </form>

                @if (session('keunggulan'))
                    <div id="alert" class="flex p-4 mb-4 bg-green-50 text-green-800 rounded-lg" role="alert">
                        <i class="fa-solid fa-circle-check"></i>
                        <div class="ml-3 text-sm font-medium">
                            {{ session('keunggulan') }}
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
                                    Keunggulan
                                </th>
                                <th scope="col" class="md:w-2/12 px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($benefits as $no => $benefit)
                                <tr class="bg-white border-b transition ease-in-out duration-200 hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        {{ $no + 1 }}
                                    </td>
                                    <th scope="row" class="px-6 py-4 font-light">
                                        {{ $benefit->benefit }}
                                    </th>
                                    <td colspan="3" class="space-y-2 px-6 py-4">
                                        <form action="{{ route('programbenefit.update', $benefit->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="uuid" value="{{ $benefit->uuid }}">
                                            <input type="hidden" name="benefit" value="{{ $benefit->benefit }}">
                                            <input type="hidden" name="status"
                                                value="{{ $benefit->status == 1 ? 0 : 1 }}">
                                            <button role="button" type="submit"
                                                class="w-full md:w-auto block md:inline text-center text-white px-2 py-1 text-sm rounded {{ $benefit->status == 1 ? 'bg-blue-500' : 'bg-red-500' }}">{!! $benefit->status == 1
                                                    ? '<i class="fa-solid fa-toggle-on fa-1x"></i>'
                                                    : '<i class="fa-solid fa-toggle-off fa-1x"></i>' !!}</button>
                                        </form>
                                        <!-- Delete -->
                                        <button role="button" data-modal-target="popup-modal{{ $benefit->id }}"
                                            data-modal-toggle="popup-modal{{ $benefit->id }}"
                                            class="w-full md:w-auto block md:inline-block text-center bg-red-600 px-2 py-1 text-sm rounded text-white"><i
                                                class="fa-solid fa-trash"></i></button>
                                        <div id="popup-modal{{ $benefit->id }}" tabindex="-1"
                                            class="hidden fixed top-0 left-0 right-0 z-50 p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                            <div class="relative w-full h-full max-w-md md:h-auto">
                                                <div class="relative bg-white rounded-lg shadow">
                                                    <button type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                                        data-modal-hide="popup-modal{{ $benefit->id }}">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </button>
                                                    <div class="flex flex-col p-6 text-center">
                                                        <i
                                                            class="block mb-5 text-gray-500 fa-solid fa-circle-exclamation fa-3x"></i>
                                                        <h3 class="mb-5 text-lg font-normal text-gray-500">Kamu yakin akan
                                                            menghapus keunggulan ini?
                                                        </h3>
                                                        <div class="flex justify-center gap-2">
                                                            <form
                                                                action="{{ route('programbenefit.destroy', $benefit->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button role="button"
                                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                                    Ya, tentu saja!
                                                                </button>
                                                            </form>
                                                            <button data-modal-hide="popup-modal{{ $benefit->id }}"
                                                                type="button"
                                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Tidak,
                                                                batalkan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
            <hr class="my-3">
            <div class="flex-1">
                <form action="{{ route('programcareer.store') }}"
                    class="flex flex-col md:flex-row md:items-start gap-4 py-3" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="flex-1 space-y-2">
                        <div>
                            <input type="hidden" name="uuid" value="{{ $program->uuid }}">
                            <input type="text" name="career"
                                class="w-full p-2 text-gray-700 border border-gray-300 @error('career') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Tulis misi jurusan disini..">
                            <small class="mt-2 text-xs text-red-500">
                                {{ $errors->first('career') }}</small>
                        </div>
                    </div>
                    <div>
                        <span role="button" onclick="copyLinkAPI('/api/programcareers/{{ $program->uuid }}')"
                            class="inline-block text-sm rounded-lg text-sky-600 bg-slate-200 px-5 py-2"><i
                                class="fa-solid fa-link"></i> Salin API</span>
                        <button type="submit" class="bg-cyan-600 text-white text-sm py-2 px-3 rounded-md"><i
                                class="fa-solid fa-floppy-disk"></i> <span id="btnSubmit">Simpan</span></button>
                    </div>
                </form>

                @if (session('karir'))
                    <div id="alert" class="flex p-4 mb-4 bg-green-50 text-green-800 rounded-lg" role="alert">
                        <i class="fa-solid fa-circle-check"></i>
                        <div class="ml-3 text-sm font-medium">
                            {{ session('karir') }}
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
                                    Potensi Karir
                                </th>
                                <th scope="col" class="md:w-2/12 px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($careers as $no => $career)
                                <tr class="bg-white border-b transition ease-in-out duration-200 hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        {{ $no + 1 }}
                                    </td>
                                    <th class="px-6 py-4 font-light">
                                        {{ $career->career }}
                                    </th>
                                    <td colspan="3" class="space-y-2 px-6 py-4">
                                        <form action="{{ route('programcareer.update', $career->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="uuid" value="{{ $career->uuid }}">
                                            <input type="hidden" name="career" value="{{ $career->career }}">
                                            <input type="hidden" name="status"
                                                value="{{ $career->status == 1 ? 0 : 1 }}">
                                            <button role="button" type="submit"
                                                class="w-full md:w-auto block md:inline text-center text-white px-2 py-1 text-sm rounded {{ $career->status == 1 ? 'bg-blue-500' : 'bg-red-500' }}">{!! $career->status == 1
                                                    ? '<i class="fa-solid fa-toggle-on fa-1x"></i>'
                                                    : '<i class="fa-solid fa-toggle-off fa-1x"></i>' !!}</button>
                                        </form>
                                        <!-- Delete -->
                                        <button role="button" data-modal-target="popup-modal{{ $career->id }}"
                                            data-modal-toggle="popup-modal{{ $career->id }}"
                                            class="w-full md:w-auto block md:inline-block text-center bg-red-600 px-2 py-1 text-sm rounded text-white"><i
                                                class="fa-solid fa-trash"></i></button>
                                        <div id="popup-modal{{ $career->id }}" tabindex="-1"
                                            class="hidden fixed top-0 left-0 right-0 z-50 p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                            <div class="relative w-full h-full max-w-md md:h-auto">
                                                <div class="relative bg-white rounded-lg shadow">
                                                    <button type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                                        data-modal-hide="popup-modal{{ $career->id }}">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </button>
                                                    <div class="flex flex-col p-6 text-center">
                                                        <i
                                                            class="block mb-5 text-gray-500 fa-solid fa-circle-exclamation fa-3x"></i>
                                                        <h3 class="mb-5 text-lg font-normal text-gray-500">Kamu yakin akan
                                                            menghapus potensi karir ini?
                                                        </h3>
                                                        <div class="flex justify-center gap-2">
                                                            <form
                                                                action="{{ route('programcareer.destroy', $career->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button role="button"
                                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                                    Ya, tentu saja!
                                                                </button>
                                                            </form>
                                                            <button data-modal-hide="popup-modal{{ $career->id }}"
                                                                type="button"
                                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Tidak,
                                                                batalkan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
        </div>
        <hr class="my-5">
        <div class="flex flex-col gap-2">
            <div class="flex-1">
                <form action="{{ route('programcompetence.store') }}"
                    class="flex flex-col md:flex-row md:items-start gap-4 py-3" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="flex-1 space-y-2">
                        <div>
                            <input type="hidden" name="uuid" value="{{ $program->uuid }}">
                            <input type="text" name="competence"
                                class="w-full p-2 text-gray-700 border border-gray-300 @error('competence') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Tulis keunggulan jurusan disini..">
                            <small class="mt-2 text-xs text-red-500">
                                {{ $errors->first('competence') }}</small>
                        </div>
                    </div>
                    <div>
                        <span role="button" onclick="copyLinkAPI('/api/programcompetences/{{ $program->uuid }}')"
                            class="inline-block text-sm rounded-lg text-sky-600 bg-slate-200 px-5 py-2"><i
                                class="fa-solid fa-link"></i> Salin API</span>
                        <button type="submit" class="bg-cyan-600 text-white text-sm py-2 px-3 rounded-md"><i
                                class="fa-solid fa-floppy-disk"></i> <span id="btnSubmit">Simpan</span></button>
                    </div>
                </form>

                @if (session('kompetensi'))
                    <div id="alert" class="flex p-4 mb-4 bg-green-50 text-green-800 rounded-lg" role="alert">
                        <i class="fa-solid fa-circle-check"></i>
                        <div class="ml-3 text-sm font-medium">
                            {{ session('kompetensi') }}
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
                                    Standar Kompetensi & Lulusan
                                </th>
                                <th scope="col" class="md:w-2/12 px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($competences as $no => $competence)
                                <tr class="bg-white border-b transition ease-in-out duration-200 hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        {{ $no + 1 }}
                                    </td>
                                    <th scope="row" class="px-6 py-4 font-light">
                                        {{ $competence->competence }}
                                    </th>
                                    <td colspan="3" class="space-y-2 px-6 py-4">
                                        <form action="{{ route('programcompetence.update', $competence->id) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="uuid" value="{{ $competence->uuid }}">
                                            <input type="hidden" name="competence"
                                                value="{{ $competence->competence }}">
                                            <input type="hidden" name="status"
                                                value="{{ $competence->status == 1 ? 0 : 1 }}">
                                            <button role="button" type="submit"
                                                class="w-full md:w-auto block md:inline text-center text-white px-2 py-1 text-sm rounded {{ $competence->status == 1 ? 'bg-blue-500' : 'bg-red-500' }}">{!! $competence->status == 1
                                                    ? '<i class="fa-solid fa-toggle-on fa-1x"></i>'
                                                    : '<i class="fa-solid fa-toggle-off fa-1x"></i>' !!}</button>
                                        </form>
                                        <!-- Delete -->
                                        <button role="button" data-modal-target="popup-modal{{ $competence->id }}"
                                            data-modal-toggle="popup-modal{{ $competence->id }}"
                                            class="w-full md:w-auto block md:inline-block text-center bg-red-600 px-2 py-1 text-sm rounded text-white"><i
                                                class="fa-solid fa-trash"></i></button>
                                        <div id="popup-modal{{ $competence->id }}" tabindex="-1"
                                            class="hidden fixed top-0 left-0 right-0 z-50 p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                            <div class="relative w-full h-full max-w-md md:h-auto">
                                                <div class="relative bg-white rounded-lg shadow">
                                                    <button type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                                        data-modal-hide="popup-modal{{ $competence->id }}">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </button>
                                                    <div class="flex flex-col p-6 text-center">
                                                        <i
                                                            class="block mb-5 text-gray-500 fa-solid fa-circle-exclamation fa-3x"></i>
                                                        <h3 class="mb-5 text-lg font-normal text-gray-500">Kamu yakin akan
                                                            menghapus kompetensi ini?
                                                        </h3>
                                                        <div class="flex justify-center gap-2">
                                                            <form
                                                                action="{{ route('programcompetence.destroy', $competence->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button role="button"
                                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                                    Ya, tentu saja!
                                                                </button>
                                                            </form>
                                                            <button data-modal-hide="popup-modal{{ $competence->id }}"
                                                                type="button"
                                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Tidak,
                                                                batalkan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
            <div class="flex-1">
                <form action="{{ route('programalumni.store') }}"
                    class="flex flex-col md:flex-row md:items-start gap-4 py-3" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="flex-1 space-y-2">
                        <div>
                            <input type="hidden" name="uuid" class="hidden" value="{{ $program->uuid }}">
                            <input type="text" name="name"
                                class="w-full p-2 text-gray-700 border border-gray-300 @error('name') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Tulis nama lengkap disini..">
                            <small class="mt-2 text-xs text-red-500">
                                {{ $errors->first('name') }}</small>
                        </div>
                        <div>
                            <input type="text" name="work"
                                class="w-full p-2 text-gray-700 border border-gray-300 @error('work') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Tulis nama perusahaan tempat bekerja disini..">
                            <small class="mt-2 text-xs text-red-500">
                                {{ $errors->first('work') }}</small>
                        </div>
                        <div>
                            <input type="text" name="year"
                                class="w-full p-2 text-gray-700 border border-gray-300 @error('year') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Tulis tahun lulus disini..">
                            <small class="mt-2 text-xs text-red-500">
                                {{ $errors->first('year') }}</small>
                        </div>
                    </div>
                    <div class="flex-1 space-y-2">
                        <div>
                            <input type="text" name="school"
                                class="w-full p-2 text-gray-700 border border-gray-300 @error('school') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Tulis nama sekolah disini..">
                            <small class="mt-2 text-xs text-red-500">
                                {{ $errors->first('school') }}</small>
                        </div>
                        <div>
                            <input type="text" name="profession"
                                class="w-full p-2 text-gray-700 border border-gray-300 @error('profession') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Tulis nama profesi disini..">
                            <small class="mt-2 text-xs text-red-500">
                                {{ $errors->first('profession') }}</small>
                        </div>
                        <div>
                            <input type="file" name="image"
                                class="w-full text-gray-700 border border-gray-300 @error('image') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500">
                            <small class="mt-2 text-xs text-slate-600"><span class="font-bold">Ketentuan:</span> Ukuran
                                gambar
                                dimensi
                                1:1 (1MB)</small>
                            <small class="mt-2 text-xs text-red-500">{{ $errors->first('image') }}</small>
                        </div>
                    </div>
                    <div class="flex-1 space-y-2">
                        <div>
                            <textarea type="text" name="quote" rows="7"
                                class="w-full p-2 text-gray-700 border border-gray-300 @error('quote') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Tulis testimoni alumni disini.."></textarea>
                            <small class="mt-2 text-xs text-red-500">
                                {{ $errors->first('quote') }}</small>
                        </div>
                    </div>
                    <div class="flex flex-col space-y-2">
                        <span role="button" onclick="copyLinkAPI('/api/programalumnis/{{ $program->uuid }}')"
                            class="inline-block text-sm rounded-lg text-sky-600 bg-slate-200 px-5 py-2"><i
                                class="fa-solid fa-link"></i> Salin API</span>
                        <button type="submit" class="bg-cyan-600 text-white text-sm py-2 px-3 rounded-md"><i
                                class="fa-solid fa-floppy-disk"></i> <span id="btnSubmit">Simpan</span></button>
                    </div>
                </form>

                @if (session('alumni'))
                    <div id="alert" class="flex p-4 mb-4 bg-green-50 text-green-800 rounded-lg" role="alert">
                        <i class="fa-solid fa-circle-check"></i>
                        <div class="ml-3 text-sm font-medium">
                            {{ session('alumni') }}
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
                                    Nama Lengkap
                                </th>
                                <th scope="col" class="md:w-4/12 px-3 py-3">
                                    Sekolah
                                </th>
                                <th scope="col" class="md:w-4/12 px-3 py-3">
                                    Bekerja
                                </th>
                                <th scope="col" class="md:w-2/12 px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($alumnis as $no => $alumni)
                                <tr class="bg-white border-b transition ease-in-out duration-200 hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        {{ $no + 1 }}
                                    </td>
                                    <th scope="row" class="px-6 py-4 font-light">
                                        {{ $alumni->name }}
                                    </th>
                                    <td scope="row" class="px-6 py-4">
                                        {{ $alumni->school }}
                                    </td>
                                    <td scope="row" class="px-6 py-4">
                                        {{ $alumni->profession }}
                                        <span>{{ $alumni->work }}</span>
                                    </td>
                                    <td colspan="3" class="space-y-2 px-6 py-4">
                                        <form action="{{ route('programalumni.update', $alumni->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="uuid" value="{{ $alumni->uuid }}">
                                            <input type="hidden" name="name" value="{{ $alumni->name }}">
                                            <input type="hidden" name="school" value="{{ $alumni->school }}">
                                            <input type="hidden" name="work" value="{{ $alumni->work }}">
                                            <input type="hidden" name="profession" value="{{ $alumni->profession }}">
                                            <input type="hidden" name="quote" value="{{ $alumni->quote }}">
                                            <input type="hidden" name="year" value="{{ $alumni->year }}">
                                            <input type="hidden" name="status"
                                                value="{{ $alumni->status == 1 ? 0 : 1 }}">
                                            <button role="button" type="submit"
                                                class="w-full md:w-auto block md:inline text-center text-white px-2 py-1 text-sm rounded {{ $alumni->status == 1 ? 'bg-blue-500' : 'bg-red-500' }}">{!! $alumni->status == 1
                                                    ? '<i class="fa-solid fa-toggle-on fa-1x"></i>'
                                                    : '<i class="fa-solid fa-toggle-off fa-1x"></i>' !!}</button>
                                        </form>
                                        <!-- Delete -->
                                        <button role="button" data-modal-target="popup-modal{{ $alumni->id }}"
                                            data-modal-toggle="popup-modal{{ $alumni->id }}"
                                            class="w-full md:w-auto block md:inline-block text-center bg-red-600 px-2 py-1 text-sm rounded text-white"><i
                                                class="fa-solid fa-trash"></i></button>
                                        <div id="popup-modal{{ $alumni->id }}" tabindex="-1"
                                            class="hidden fixed top-0 left-0 right-0 z-50 p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                            <div class="relative w-full h-full max-w-md md:h-auto">
                                                <div class="relative bg-white rounded-lg shadow">
                                                    <button type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                                        data-modal-hide="popup-modal{{ $alumni->id }}">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </button>
                                                    <div class="flex flex-col p-6 text-center">
                                                        <i
                                                            class="block mb-5 text-gray-500 fa-solid fa-circle-exclamation fa-3x"></i>
                                                        <h3 class="mb-5 text-lg font-normal text-gray-500">Kamu yakin akan
                                                            menghapus kompetensi ini?
                                                        </h3>
                                                        <div class="flex justify-center gap-2">
                                                            <form
                                                                action="{{ route('programalumni.destroy', $alumni->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button role="button"
                                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                                    Ya, tentu saja!
                                                                </button>
                                                            </form>
                                                            <button data-modal-hide="popup-modal{{ $alumni->id }}"
                                                                type="button"
                                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Tidak,
                                                                batalkan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
        </div>
    </div>
@endsection
