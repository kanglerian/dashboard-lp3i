@extends('layouts.dashboard')

@section('content')
    <div class="flex-1 overflow-x-auto">
        <div class="space-y-1">
            <h1 class="text-2xl font-bold">Selamat Datang, <?= Auth::user()->name ?> 👋</h1>
            <p class="text-slate-800">Ini adalah fitur Admin Dashboard dimana <?= Auth::user()->name ?> bisa mengedit beberapa informasi yang tersedia di menu sebelah kiri. Silahkan diakses! 😊</p>
        </div>
    </div>
@endsection
