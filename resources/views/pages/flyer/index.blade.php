@extends('layouts.dashboard')

@section('content')
    <div class="flex flex-col">
        <div class="flex flex-col md:flex-row items-center gap-5 py-5">
            <div class="w-full md:w-1/2 space-y-2">
                <a href="{{ route('agenda.index') }}">
                    <h1 class="font-bold text-2xl">Flyer</h1>
                </a>
                <p class="text-gray-500 text-sm">Fitur flyer adalah gambar yang dapat digunakan pada halaman depan untuk
                    menyampaikan informasi atau iklan. Ini adalah cara yang berguna dan nyaman untuk memperbarui konten
                    tanpa
                    harus mengubah bagian lain dari halaman.</p>
                <span role="button" onclick="copyLinkAPI('/api/flyers')"
                    class="inline-block text-sm rounded-lg text-sky-600 bg-slate-200 px-5 py-2"><i
                        class="fa-solid fa-link"></i>
                    <span id="linkAPI">/api/flyers</span></span>
            </div>
            <form action="{{ route('flyer.store') }}" class="w-full md:w-1/2 space-y-2" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="w-full">
                    <label for="headline" class="block mb-1 text-sm font-medium text-gray-900">Judul</label>
                    <input type="text" name="headline" id="headline"
                        class="bg-gray-50 border border-gray-300 @error('headline') border-red-500 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Tulis headline disini.." required>
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('headline') }}
                    </small>
                </div>
                <div class="w-full">
                    <label for="paragraph" class="block mb-1 text-sm font-medium text-gray-900">Deskripsi</label>
                    <textarea name="paragraph" id="paragraph"
                        class="bg-gray-50 border border-gray-300 @error('paragraph') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Isi deskripsi disini..."
                        required></textarea>
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('paragraph') }}
                    </small>
                </div>
                <div class="w-full">
                    <label for="location" class="block mb-1 text-sm font-medium text-gray-900">Pilih lokasi</label>
                    <select name="location" id="location"
                        class="bg-gray-50 border border-gray-300 @error('location') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                        <option>Pilih lokasi</option>
                        <option value="R">Kelas Reguler</option>
                        <option value="K">Kelas Karyawan</option>
                    </select>
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('location') }}
                    </small>
                </div>
                <div class="w-full">
                    <label class="block mb-1 text-sm font-medium text-gray-900" for="image">Upload Poster</label>
                    <input
                        class="bg-gray-50 border border-gray-300 @error('status') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        id="image" type="file" name="image">
                    <div class="mt-1 text-xs text-gray-500">
                        <span class="font-bold">Ketentuan:</span>
                        <span>Ukuran gambar dimensi 16:9 (1MB)</span>
                    </div>
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('image') }}
                    </small>
                </div>
                <button type="submit" class="mt-3 bg-cyan-600 text-white text-sm py-2 px-3 rounded-md"><i
                        class="fa-solid fa-floppy-disk"></i> <span id="btnSubmit">Simpan</span></button>
            </form>
        </div>
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
                        <th scope="col" class="md:w-4/12 px-3 py-3">
                            Gambar
                        </th>
                        <th scope="col" class="md:w-3/12 px-6 py-3">
                            Headline
                        </th>
                        <th scope="col" class="md:w-2/12 px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($flyers as $number => $flyer)
                        <tr class="bg-white border-b transition ease-in-out duration-200 hover:bg-gray-50">
                            <td class="px-6 py-4">
                                {{ $number + 1 }}
                            </td>
                            <th scope="row" class="px-6 py-4">
                                <img loading="lazy" src="{{ asset($flyer->image) }}" class="w-44 rounded">
                            </th>
                            <th scope="row" class="px-6 py-4 text-gray-800 space-y-1">
                                <h2 class="font-bold">{{ $flyer->headline }}</h2>
                                <p class="text-xs font-light">
                                    {{ $flyer->paragraph }}
                                    <br>
                                    @switch($flyer->location)
                                        @case('R')
                                            Kelas Reguler
                                        @break

                                        @case('K')
                                            Kelas Karyawan
                                        @break
                                    @endswitch
                                </p>
                            </th>
                            <td colspan="2" class="space-y-2 px-6 py-4">
                                <form action="{{ route('flyer.change', $flyer->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="headline" value="{{ $flyer->headline }}">
                                    <input type="hidden" name="paragraph" value="{{ $flyer->paragraph }}">
                                    <button role="button" type="submit"
                                        class="w-full md:w-auto block md:inline text-center text-white px-2 py-1 text-sm rounded {{ $flyer->status == 1 ? 'bg-blue-500' : 'bg-red-500' }}">{!! $flyer->status == 1
                                            ? '<i class="fa-solid fa-toggle-on fa-1x"></i>'
                                            : '<i class="fa-solid fa-toggle-off fa-1x"></i>' !!}</button>
                                </form>
                                <button
                                    class="w-full md:w-auto block md:inline text-center bg-amber-400 px-2 py-1 text-sm rounded text-white"><a
                                        href="{{ route('flyer.edit', $flyer->id) }}"><i
                                            class="fa-regular fa-pen-to-square"></i></a></button>
                                <!-- Delete -->
                                <button role="button" 
                                onclick="event.preventDefault(); deleteRecord('{{ $flyer->id }}')"
                                    class="w-full md:w-auto block md:inline text-center bg-red-600 px-2 py-1 text-sm rounded text-white"><i
                                        class="fa-solid fa-trash"></i></button>
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

    <script>
        const deleteRecord = (id) => {
            var token = $('meta[name="csrf-token"]').attr('content');
            if (confirm(`Apakah kamu yakin akan menghapus data?`)) {
                $.ajax({
                    url: `/flyer/${id}`,
                    type: 'POST',
                    data: {
                        '_method': 'DELETE',
                        '_token': token
                    },
                    success: function(response) {
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        alert('Error deleting record');
                        console.log(error);
                        console.log(status);
                    }
                })
            }
        }
    </script>