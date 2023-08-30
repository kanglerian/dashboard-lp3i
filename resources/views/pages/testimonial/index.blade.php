@extends('layouts.dashboard')

@section('content')
    <div class="flex flex-col">
        <div class="flex flex-col md:flex-row items-center gap-5 py-5">
            <div class="w-full md:w-1/2 space-y-2">
                <a href="{{ route('facility.index') }}">
                    <h1 class="font-bold text-2xl">Testimonial</h1>
                </a>
                <p class="text-gray-500 text-sm">Fitur fasilitas adalah konten yang dapat digunakan pada halaman depan untuk
                    menyampaikan berbagai macam fasilitas yang ada di LP3I. Ini adalah cara yang berguna dan nyaman untuk
                    memperbarui konten tanpa harus mengubah bagian lain dari halaman.</p>
                <span role="button" onclick="copyLinkAPI('/api/testimonals')"
                    class="inline-block text-sm rounded-lg text-sky-600 bg-slate-200 px-5 py-2"><i
                        class="fa-solid fa-link"></i>
                    <span id="linkAPI">/api/testimonals</span></span>
            </div>
            <form action="{{ route('programalumni.store') }}" class="w-full md:w-1/2 space-y-2" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="w-full">
                    <label for="name" class="block mb-1 text-sm font-medium text-gray-900">Nama lengkap</label>
                    <input type="text" name="name" id="name"
                        class="bg-gray-50 border border-gray-300 @error('name') border-red-500 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Tulis nama alumni disini.." required>
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('name') }}
                    </small>
                </div>
                <div class="w-full">
                    <label for="school" class="block mb-1 text-sm font-medium text-gray-900">Asal sekolah</label>
                    <input type="text" name="school" id="school"
                        class="bg-gray-50 border border-gray-300 @error('school') border-red-500 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Tulis nama sekolah disini.." required>
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('school') }}
                    </small>
                </div>
                <div class="w-full">
                    <label for="work" class="block mb-1 text-sm font-medium text-gray-900">Tempat bekerja</label>
                    <input type="text" name="work" id="work"
                        class="bg-gray-50 border border-gray-300 @error('work') border-red-500 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Tulis nama perusahaan tempat bekerja disini.." required>
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('work') }}
                    </small>
                </div>
                <div class="w-full">
                    <label for="profession" class="block mb-1 text-sm font-medium text-gray-900">Profesi</label>
                    <input type="text" name="profession" id="profession"
                        class="bg-gray-50 border border-gray-300 @error('profession') border-red-500 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Tulis nama profesi disini.." required>
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('profession') }}
                    </small>
                </div>
                <div class="w-full">
                    <label for="year" class="block mb-1 text-sm font-medium text-gray-900">Alumni lulus</label>
                    <input type="year" name="year" id="year"
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
                    <textarea name="quote" id="quote"
                        class="bg-gray-50 border border-gray-300 @error('quote') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Isi quote disini..." required></textarea>
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('quote') }}
                    </small>
                </div>
                <div class="w-full">
                    <label for="uuid" class="block mb-1 text-sm font-medium text-gray-900">Program Studi</label>
                    <select name="uuid" id="uuid"
                        class="bg-gray-50 border border-gray-300 @error('uuid') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                        <option>Pilih Program Studi</option>
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
                        <option>Pilih Karir</option>
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
                    <label for="status" class="block mb-1 text-sm font-medium text-gray-900">Status</label>
                    <select name="status" id="status"
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
                                <img loading="lazy" src="{{ asset($alumni->image) }}" class="w-32 rounded-lg">
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
                                <button role="button" 
                                onclick="event.preventDefault(); deleteRecord('{{ $alumni->id }}')"
                                    class="w-full md:w-auto block md:inline-block text-center bg-red-600 px-2 py-1 text-sm rounded text-white"><i
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
                    url: `/programalumni/${id}`,
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
