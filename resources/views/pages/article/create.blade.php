@extends('layouts.dashboard')

@section('content')
    <div class="w-full px-2">
        <form action="{{ route('article.store') }}" class="flex flex-col md:items-start gap-2 py-3" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="w-full">
                <label for="narasumber" class="block mb-1 text-sm font-medium text-gray-900">Narasumber</label>
                <input type="text" name="narasumber" id="narasumber"
                    class="bg-gray-50 border border-gray-300 @error('narasumber') border-red-500 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Tulis nama narasumber disini.." required>
                <small class="mt-2 text-xs text-red-500">
                    {{ $errors->first('narasumber') }}
                </small>
            </div>
            <div class="w-full">
                <label for="title" class="block mb-1 text-sm font-medium text-gray-900">Judul</label>
                <input type="text" name="title" id="title"
                    class="bg-gray-50 border border-gray-300 @error('title') border-red-500 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Tulis nama agenda disini.." required>
                <small class="mt-2 text-xs text-red-500">
                    {{ $errors->first('title') }}
                </small>
            </div>
            <div class="w-full">
                <label for="kolom" class="block mb-1 text-sm font-medium text-gray-900">Kolom</label>
                <select name="kolom" id="kolom"
                    class="bg-gray-50 border border-gray-300 @error('kolom') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required>
                    <option value="0">Pilih kolom</option>
                    <option value="Wacana">Wacana</option>
                    <option value="Edukasi">Edukasi</option>
                    <option value="Gaya Hidup">Gaya Hidup</option>
                    <option value="Pariwisata">Pariwisata</option>
                    <option value="Pendidikan">Pendidikan</option>
                    <option value="Redaksi Radar">Redaksi Radar</option>
                    <option value="Ekonomi">Ekonomi</option>
                </select>
                <small class="mt-2 text-xs text-red-500">
                    {{ $errors->first('kolom') }}
                </small>
            </div>
            <div class="w-full">
                <label for="media" class="block mb-1 text-sm font-medium text-gray-900">Media</label>
                <input type="text" name="media" id="media"
                    class="bg-gray-50 border border-gray-300 @error('media') border-red-500 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Tulis nama media disini.." required>
                <small class="mt-2 text-xs text-red-500">
                    {{ $errors->first('media') }}
                </small>
            </div>
            <div class="w-full">
                <label for="kegiatan" class="block mb-1 text-sm font-medium text-gray-900">Kegiatan</label>
                <input type="text" name="kegiatan" id="kegiatan"
                    class="bg-gray-50 border border-gray-300 @error('kegiatan') border-red-500 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Tulis link kegiatan disini.." required>
                <small class="mt-2 text-xs text-red-500">
                    {{ $errors->first('kegiatan') }}
                </small>
            </div>
            <div class="w-full">
                <label for="source" class="block mb-1 text-sm font-medium text-gray-900">Sumber</label>
                <input type="text" name="source" id="source"
                    class="bg-gray-50 border border-gray-300 @error('source') border-red-500 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Tulis link sumber disini.." required>
                <small class="mt-2 text-xs text-red-500">
                    {{ $errors->first('source') }}
                </small>
            </div>
            <div class="w-full">
                <label for="date" class="block mb-1 text-sm font-medium text-gray-900">Tanggal</label>
                <input type="date" name="date" id="date"
                    class="bg-gray-50 border border-gray-300 @error('date') border-red-500 @enderror  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Tulis tanggal media disini.." required>
                <small class="mt-2 text-xs text-red-500">
                    {{ $errors->first('date') }}
                </small>
            </div>
            <div class="w-full">
                <label class="block mb-1 text-sm font-medium text-gray-900" for="image">Upload Gambar</label>
                <input
                    class="bg-gray-50 border border-gray-300 @error('image') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    id="image" type="file" name="image">
                <div class="mt-1 text-xs text-gray-500">
                    <span class="font-bold">Ketentuan:</span>
                    <span>Ukuran gambar dimensi 4:5 (1MB)</span>
                </div>
                <small class="mt-2 text-xs text-red-500">
                    {{ $errors->first('image') }}
                </small>
            </div>
            <div class="w-full">
                <label for="description" class="block mb-1 text-sm font-medium text-gray-900">Deskripsi</label>
                <textarea name="description" id="description"
                    class="bg-gray-50 border border-gray-300 @error('description') border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Isi deskripsi disini..." required></textarea>
                <small class="mt-2 text-xs text-red-500">
                    {{ $errors->first('description') }}
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

    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
    <script>
        const editDescription = () => {
            let description = `Tulis artikel disini...`;
            var editor = CKEDITOR.instances.description;
            let descriptionInput = document.getElementById('description');
            editor.setData(description);
            descriptionInput.innerHTML = description;
        }
        editDescription();
    </script>
@endsection
