@extends('layouts.dashboard')

@section('content')
<div class="flex flex-col">
    <div class="flex flex-col md:flex-row items-center gap-5 py-5">
        <div class="w-full space-y-2">
            <a href="{{ route('article.index') }}">
                <h1 class="font-bold text-2xl">Artikel</h1>
            </a>
            <p class="text-gray-500 text-sm">Fitur artikel adalah konten yang dapat digunakan pada halaman depan untuk menyampaikan berbagai macam artikel yang di unggah oleh Dosen LP3I. Ini adalah cara yang berguna dan nyaman untuk memperbarui konten tanpa harus mengubah bagian lain dari halaman.</p>
            <div class="flex gap-3">
                <a href="{{ route('article.create') }}" role="button"
                class="inline-block text-sm rounded-lg text-white bg-sky-500 hover:bg-sky-600 px-5 py-2"><i
                    class="fa-solid fa-circle-plus"></i> Tambah Data</a>
                <span role="button" onclick="copyLinkAPI('/api/articles')"
                    class="inline-block text-sm rounded-lg text-sky-600 bg-slate-200 px-5 py-2"><i
                        class="fa-solid fa-link"></i>
                    <span id="linkAPI">/api/articles</span>
                </span>
            </div>
        </div>
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
                        Poster
                    </th>
                    <th scope="col" class="md:w-3/12 px-6 py-3">
                        Judul Media
                    </th>
                    <th scope="col" class="md:w-2/12 px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($articles as $number => $article)
                    <tr class="bg-white border-b transition ease-in-out duration-200 hover:bg-gray-50">
                        <td class="px-6 py-4">
                            {{ $number + 1 }}
                        </td>
                        <th scope="row" class="px-6 py-4">
                            <img loading="lazy" src="{{ asset($article->image) }}" class="w-32 rounded">
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                            {{ $article->title }}
                            <p class="text-gray-500 font-normal text-xs mt-1 text-justify">
                                {{ date('d F Y', strtotime($article->date)) }}
                            </p>
                        </th>
                        <td colspan="2" class="space-y-2 px-6 py-4">
                            <!-- Toggle -->
                            <form action="{{ route('article.update', $article->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="narasumber" value="{{ $article->narasumber }}">
                                <input type="hidden" name="title" value="{{ $article->title }}">
                                <input type="hidden" name="kolom" value="{{ $article->kolom }}">
                                <input type="hidden" name="media" value="{{ $article->media }}">
                                <input type="hidden" name="kegiatan" value="{{ $article->kegiatan }}">
                                <input type="hidden" name="uuid" value="{{ $article->uuid }}">
                                <input type="hidden" name="description" value="{{ $article->description }}">
                                <input type="hidden" name="date" value="{{ $article->date }}">
                                <input type="hidden" name="source" value="{{ $article->source }}">
                                <input type="hidden" name="status" value="{{ $article->status == 1 ? 0 : 1 }}">
                                <button role="button" type="submit"
                                    class="w-full md:w-auto block md:inline text-center text-white px-2 py-1 text-sm rounded {{ $article->status == 1 ? 'bg-blue-500' : 'bg-red-500' }}">{!! $article->status == 1
                                        ? '<i class="fa-solid fa-toggle-on fa-1x"></i>'
                                        : '<i class="fa-solid fa-toggle-off fa-1x"></i>' !!}</button>
                            </form>
                            <!-- Edit -->
                            <button
                                class="w-full md:w-auto block md:inline text-center bg-amber-400 px-2 py-1 text-sm rounded text-white"><a
                                    href="{{ route('article.edit', $article->id) }}"><i
                                        class="fa-regular fa-pen-to-square"></i></a></button>
                            <!-- Delete -->
                            <button role="button" 
                            onclick="event.preventDefault(); deleteRecord('{{ $article->id }}')"
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
                url: `/article/${id}`,
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
