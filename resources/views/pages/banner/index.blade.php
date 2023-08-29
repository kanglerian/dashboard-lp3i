@extends('layouts.dashboard')

@section('content')
    <div class="flex flex-col">
        <div class="flex flex-col md:flex-row items-center gap-5 py-5">
            <div class="w-full md:w-1/2 space-y-2">
                <a href="{{ route('banner.index') }}">
                    <h1 class="font-bold text-2xl">Spanduk</h1>
                </a>
                <p class="text-gray-500 text-sm">Fitur spanduk adalah gambar yang dapat digunakan pada halaman depan untuk
                    menyampaikan informasi atau iklan. Ini adalah cara yang berguna dan nyaman untuk memperbarui konten
                    tanpa
                    harus mengubah bagian lain dari halaman.</p>
                <span role="button" onclick="copyLinkAPI('/api/banners')"
                    class="inline-block text-sm rounded-lg text-sky-600 bg-slate-200 px-5 py-2"><i
                        class="fa-solid fa-link"></i>
                    <span id="linkAPI">/api/banners</span></span>
            </div>
            <form action="{{ route('banner.store') }}" class="w-full md:w-1/2 space-y-2" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="w-full">
                    <label for="title" class="block mb-1 text-sm font-medium text-gray-900">Judul</label>
                    <input type="text" name="title" id="title"
                        class="bg-gray-50 border border-gray-300 @error('title') border-red-500 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Tulis nama agenda disini.." required>
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('title') }}
                    </small>
                </div>
                @if (Auth::user()->role == 'uppm')
                    <input type="hidden" name="locate" value="U">
                @endif
                <div class="w-full">
                    <label for="locate" class="block mb-1 text-sm font-medium text-gray-900">Pilih lokasi</label>
                    <select type="text" name="locate" id="locate"
                        class="bg-gray-50 border border-gray-300 @error('locate') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                        <option>Pilih lokasi</option>
                        <option value="L">Landing Page</option>
                        <option value="C">Career Center</option>
                        <option value="U">UPPM</option>
                    </select>
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('locate') }}
                    </small>
                </div>
                <div class="w-full">
                    <label for="status" class="block mb-1 text-sm font-medium text-gray-900">Status</label>
                    <select type="text" name="status" id="status"
                        class="bg-gray-50 border border-gray-300 @error('status') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                        <option>Pilih</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak aktif</option>
                    </select>
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('status') }}
                    </small>
                </div>
                <div class="w-full">
                    <label class="block mb-1 text-sm font-medium text-gray-900" for="image">Upload Spanduk</label>
                    <input
                        class="bg-gray-50 border border-gray-300 @error('status') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        id="image" type="file" name="image">
                    <div class="mt-1 text-xs text-gray-500">
                        <span class="font-bold">Ketentuan:</span>
                        <span>Ukuran maksimal file (1MB)</span>
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
                            Judul
                        </th>
                        <th scope="col" class="md:w-3/12 px-6 py-3">
                            Lokasi
                        </th>
                        <th scope="col" class="md:w-2/12 px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($banners as $number => $banner)
                        <tr class="bg-white border-b transition ease-in-out duration-200 hover:bg-gray-50">
                            <td class="px-6 py-4">
                                {{ $number + 1 }}
                            </td>
                            <th scope="row" class="px-6 py-4">
                                <img loading="lazy" src="{{ asset($banner->image) }}" class="w-44 rounded">
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                                {{ $banner->title }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                                @switch($banner->locate)
                                    @case('L')
                                        {{ 'Landing Page' }}
                                    @break

                                    @case('C')
                                        {{ 'Career Center' }}
                                    @break

                                    @case('U')
                                        {{ 'UPPM' }}
                                    @break
                                @endswitch
                            </th>
                            <td colspan="2" class="space-y-2 px-6 py-4">
                                <!-- Toggle -->
                                <form action="{{ route('banner.update', $banner->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="title" value="{{ $banner->title }}">
                                    <input type="hidden" name="locate" value="{{ $banner->locate }}">
                                    <input type="hidden" name="status" value="{{ $banner->status == 1 ? 0 : 1 }}">
                                    <button role="button" type="submit"
                                        class="w-full md:w-auto block md:inline text-center text-white px-2 py-1 text-sm rounded {{ $banner->status == 1 ? 'bg-blue-500' : 'bg-red-500' }}">{!! $banner->status == 1
                                            ? '<i class="fa-solid fa-toggle-on fa-1x"></i>'
                                            : '<i class="fa-solid fa-toggle-off fa-1x"></i>' !!}</button>
                                </form>
                                <!-- Edit -->
                                <button
                                    class="w-full md:w-auto block md:inline text-center bg-amber-400 px-2 py-1 text-sm rounded text-white"><a
                                        href="{{ route('banner.edit', $banner->id) }}"><i
                                            class="fa-regular fa-pen-to-square"></i></a></button>
                                <!-- Delete -->
                                <button role="button" 
                                onclick="event.preventDefault(); deleteRecord('{{ $banner->id }}')"
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
                    url: `/banner/${id}`,
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
