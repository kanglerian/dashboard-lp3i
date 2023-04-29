@extends('layouts.dashboard')

@section('content')
    <div class="flex-1 flex flex-col md:flex-row gap-5 overflow-x-auto px-2">
        <div class="w-full md:2/4 order-2 md:order-none">
            <form action="{{ route('article.update', $article->id) }}" method="POST"
                class="flex flex-col md:items-start gap-2 py-2" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="w-full">
                    <input type="text" name="title" value="{{ $article->title }}"
                        class="w-full p-2 text-gray-700 border border-gray-300 @error('title') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Tulis judul artikel disini..">
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('title') }}</small>
                </div>
                <div class="w-full">
                    <input type="date" name="date" value="{{ $article->date }}"
                        class="w-full p-2 text-gray-700 border border-gray-300 @error('date') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500">
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('date') }}</small>
                </div>
                <div class="w-full">
                    <input type="text" name="source" value="{{ $article->source }}"
                        class="w-full p-2 text-gray-700 border border-gray-300 @error('source') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500">
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('source') }}</small>
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
                    <select name="status"
                        class="w-full p-2 text-gray-700 border border-gray-300 @error('status') border-red-500 @enderror rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                        required>
                        <option value="{{ $article->status }}">{{ $article->status == 1 ? 'Aktif' : 'Tidak aktif' }}
                        </option>
                        <option value="{{ $article->status == 1 ? 0 : 1 }}">
                            {{ $article->status == 1 ? 'Tidak aktif' : 'Aktif' }}
                        </option>
                    </select>
                    <small class="mt-2 text-xs text-red-500">
                        {{ $errors->first('status') }}</small>
                </div>

                <div class="w-full">
                    <textarea name="description" id="description" value="{{ $article->description }}"
                        class="w-full p-2 text-gray-700 border border-gray-300 rounded-md bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Type description.." required contenteditable>{{ $article->description }}</textarea>
                </div>

                <button type="submit" class="bg-cyan-600 text-white text-sm py-2 px-3 rounded-md"><i
                        class="fa-solid fa-floppy-disk"></i> <span id="btnSubmit">Simpan perubahan</span></button>
            </form>
        </div>

        <div class="w-full md:w-2/4 order-1 md:order-none">
            <img src="{{ asset($article->image) }}" alt="{{ $article->title }}"
                class="rounded-lg border-4 border-white shadow">
        </div>

    </div>

    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
    <script>
        const editDescription = () => {
            let description = `{!! $article->description !!}`;
            var editor = CKEDITOR.instances.description;
            let descriptionInput = document.getElementById('description');
            editor.setData(description);
            descriptionInput.innerHTML = description;
        }
        editDescription();
    </script>
@endsection
