@extends('layouts.dashboard')

@section('content')
    <div class="flex-1 overflow-x-auto px-2">
        <form action="{{ route('media.store') }}" class="flex flex-col md:items-start gap-2 py-3" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="w-full">
                <input type="text" name="title"
                    class="w-full p-2 text-gray-700 border border-gray-300 @error('title') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Tulis judul media disini..">
                <small class="mt-2 text-xs text-red-500">
                    {{ $errors->first('title') }}</small>
            </div>
            <div class="w-full">
                <input type="date" name="date"
                    class="w-full p-2 text-gray-700 border border-gray-300 @error('date') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500">
                <small class="mt-2 text-xs text-red-500">
                    {{ $errors->first('date') }}</small>
            </div>
            <div class="w-full">
                <input type="file" name="image"
                    class="w-full text-gray-700 border border-gray-300 @error('image') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500">
                <small class="mt-2 text-xs text-slate-600"><span class="font-bold">Ketentuan:</span> Ukuran gambar
                    dimensi
                    16:9 (1MB)</small>
                <small class="mt-2 text-xs text-red-500">{{ $errors->first('image') }}</small>
            </div>
            <div class="w-full">
                <textarea name="description" id="description"
                    class="w-full p-2 text-gray-700 border border-gray-300 rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Type description.." required contenteditable></textarea>
            </div>

            <button type="submit" class="bg-cyan-600 text-white text-sm py-2 px-3 rounded-md"><i
                    class="fa-solid fa-floppy-disk"></i> <span id="btnSubmit">Simpan</span></button>
        </form>

    </div>

    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
    <script>
        const editDescription = () => {
            let description = `Tulis deskripsi media disini...`;
            var editor = CKEDITOR.instances.description;
            let descriptionInput = document.getElementById('description');
            editor.setData(description);
            descriptionInput.innerHTML = description;
        }
        editDescription();
    </script>
@endsection
