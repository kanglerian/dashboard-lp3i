@extends('layouts.dashboard')

@section('content')
    <div class="flex-1 overflow-x-auto px-2">
        <div class="space-y-2 mb-2">
            <a href="banner">
                <h1 class="font-bold text-2xl">Testimonial</h1>
            </a>
            <p class="text-gray-500 text-sm">Fitur agenda adalah konten yang dapat digunakan pada halaman depan untuk
                menyampaikan berbagai macam agenda yang akan dilaksanakan di LP3I. Ini adalah cara yang berguna dan nyaman
                untuk memperbarui konten tanpa harus mengubah bagian lain dari halaman.</p>
            <span role="button" onclick="copyLinkAPI('/api/testimonals')"
                class="inline-block text-sm rounded-lg text-sky-600 bg-slate-200 px-5 py-2"><i class="fa-solid fa-link"></i>
                <span id="linkAPI">/api/testimonals</span></span>
        </div>
        <form action="{{ route('programalumni.store') }}" class="flex flex-col md:flex-row md:items-start gap-4 py-3"
            method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex-1 space-y-2">
                <div>
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
                    <input type="number" name="year"
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
                    <select name="uuid"
                        class="w-full p-2 text-gray-700 border border-gray-300 @error('uuid') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                        required>
                        <option>Pilih Program Studi</option>
                        @foreach ($programs as $program)
                            <option value="{{ $program->uuid }}">{{ $program->title }}</option>
                        @endforeach
                    </select>
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('uuid') }}</small>
                </div>
                <div>
                    <select name="career"
                        class="w-full p-2 text-gray-700 border border-gray-300 @error('career') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                        required>
                        <option>Pilih Karir</option>
                        <option value="M">Magang</option>
                        <option value="K">Kerja</option>
                        <option value="W">Wirausaha</option>
                        <option value="T">Tidak bekerja</option>
                    </select>
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('career') }}</small>
                </div>
                <div>
                    <textarea type="text" name="quote" rows="3"
                        class="w-full p-2 text-gray-700 border border-gray-300 @error('quote') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Tulis testimoni alumni disini.."></textarea>
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('quote') }}</small>
                </div>
            </div>
            <div class="flex flex-col space-y-2">
                <span role="button" onclick="copyLinkAPI('/api/programtestimonials/')"
                    class="inline-block text-sm rounded-lg text-sky-600 bg-slate-200 px-5 py-2"><i
                        class="fa-solid fa-link"></i> Salin API</span>
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
                        <th scope="col" class="md:w-2/12 px-3 py-3">
                            Foto
                        </th>
                        <th scope="col" class="md:w-3/12 px-3 py-3">
                            Biodata
                        </th>
                        <th scope="col" class="md:w-3/12 px-3 py-3">
                            Testimoni
                        </th>
                        <th scope="col" class="md:w-3/12 px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($testimonials as $no => $alumni)
                        <tr class="bg-white border-b transition ease-in-out duration-200 hover:bg-gray-50">
                            <td class="px-6 py-4">
                                {{ $no + 1 }}
                            </td>
                            <th scope="row" class="px-2 py-4">
                                <img src="{{ asset($alumni->image) }}" class="w-32 rounded-lg">
                            </th>
                            <th scope="row" class="flex flex-col px-2 py-4 font-light">
                                <span>Nama: {{ $alumni->name }}</span>
                                <span>Tahun: {{ $alumni->year }}</span>
                                <hr class="my-1">
                                <span>Bekerja: {{ $alumni->work }}</span>
                                <span>Posisi: {{ $alumni->profession }}</span>
                                <hr class="my-1">
                                @switch($alumni->career)
                                    @case('M')
                                        <span class="bg-sky-500 px-3 py-1 rounded-md text-white">Magang</span>
                                    @break
                                    @case('K')
                                        <span class="bg-teal-500 px-3 py-1 rounded-md text-white">Kerja</span>
                                    @break
                                    @case('W')
                                        <span class="bg-amber-500 px-3 py-1 rounded-md text-white">Wirausaha</span>
                                    @break
                                    @case('T')
                                        <span class="bg-red-500 px-3 py-1 rounded-md text-white">Tidak bekerja</span>
                                    @break
                                @endswitch
                            </th>
                            <td scope="row" class="px-6 py-4">
                                {{ $alumni->quote }}
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
                                    <input type="hidden" name="career" value="{{ $alumni->career }}">
                                    <input type="hidden" name="year" value="{{ $alumni->year }}">
                                    <input type="hidden" name="testimoni"
                                        value="{{ $alumni->testimoni == 1 ? 0 : 1 }}">
                                    <input type="hidden" name="status" value="{{ $alumni->status }}">
                                    <button role="button" type="submit"
                                        class="w-full md:w-auto block md:inline-block text-center bg-amber-400 px-2 py-1 text-sm rounded text-white mb-2 {{ $alumni->testimoni == 1 ? 'bg-teal-500' : 'bg-red-500' }}">{!! $alumni->testimoni == 1
                                            ? '<i class="fa-solid fa-toggle-on fa-1x"></i>'
                                            : '<i class="fa-solid fa-toggle-off fa-1x"></i>' !!}</button>
                                </form>
                                <!-- Edit -->

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
                                    <input type="hidden" name="career" value="{{ $alumni->career }}">
                                    <input type="hidden" name="year" value="{{ $alumni->year }}">
                                    <input type="hidden" name="testimoni" value="{{ $alumni->testimoni }}">
                                    <input type="hidden" name="status" value="{{ $alumni->status == 1 ? 0 : 1 }}">
                                    <button role="button" type="submit"
                                        class="w-full md:w-auto block md:inline text-center text-white px-2 py-1 text-sm rounded {{ $alumni->status == 1 ? 'bg-blue-500' : 'bg-red-500' }}">{!! $alumni->status == 1
                                            ? '<i class="fa-solid fa-toggle-on fa-1x"></i>'
                                            : '<i class="fa-solid fa-toggle-off fa-1x"></i>' !!}</button>
                                </form>
                                <!-- Edit -->
                                <button
                                    class="w-full md:w-auto block md:inline-block text-center bg-amber-400 px-2 py-1 text-sm rounded text-white"><a
                                        href="{{ route('programalumni.edit', $alumni->id) }}"><i
                                            class="fa-regular fa-pen-to-square"></i></a></button>
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
                                                    <form action="{{ route('programalumni.destroy', $alumni->id) }}"
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
    @endsection
