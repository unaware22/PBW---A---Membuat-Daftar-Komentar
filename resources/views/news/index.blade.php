@extends('layouts.main')

@section('container')
    {{-- Header: Judul + Pencarian --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Daftar Berita</h1>

        {{-- Form Pencarian di kanan atas --}}
        <form method="GET" action="{{ route('news.index') }}" class="flex items-center space-x-2">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari berita..."
                class="border border-gray-300 rounded-lg px-3 py-2 w-64 focus:outline-none focus:ring focus:ring-blue-200">
            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Cari</button>
        </form>
    </div>

    {{-- Daftar Berita --}}
    <div class="space-y-6">
        @forelse ($news_list as $news)
            <div class="bg-white p-6 rounded-lg shadow-md">
                {{-- Judul Berita --}}
                <h2 class="text-2xl font-semibold mb-2">
                    <a href="{{ route('news.show', $news->id) }}" class="text-blue-600 hover:underline">
                        {{ $news->judul }}
                    </a>
                </h2>

                {{-- Info Penulis & Tanggal --}}
                <p class="text-gray-600 mb-4">
                    Oleh: {{ $news->wartawan->nama ?? 'Anonim' }} |
                    Dipublikasikan pada: {{ $news->created_at->format('d M Y') }}
                </p>

                {{-- Ringkasan --}}
                <p class="text-gray-800">
                    {{ Str::limit($news->ringkasan, 150, '...') }}
                </p>

                {{-- Tombol Baca Selengkapnya --}}
                <a href="{{ route('news.show', $news->id) }}" class="text-blue-500 hover:underline mt-4 inline-block">
                    Baca Selengkapnya
                </a>
            </div>
        @empty
            <p class="text-gray-500">Tidak ada berita ditemukan.</p>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $news_list->links() }}
    </div>
@endsection
