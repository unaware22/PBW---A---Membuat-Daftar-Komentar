@extends('layouts.main')

@section('container')
<div class="container py-5">

    {{-- Nama Aplikasi --}}
    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary">📰 Portal Berita Nusantara</h1>
        <p class="text-muted">Menyajikan berita terkini dan terpercaya</p>
        <hr class="w-25 mx-auto">
    </div>

    {{-- Card Berita --}}
    <div class="card shadow-sm border-0 mb-5">
        <div class="card-body p-5">
            <h2 class="card-title fw-bold mb-3">{{ $news->judul }}</h2>
            <p class="text-muted mb-4">
                <i class="bi bi-person-circle"></i>
                Ditulis oleh <b>{{ $news->wartawan->nama ?? 'Anonim' }}</b>
            </p>

            <p class="card-text fs-5 text-secondary" style="line-height: 1.8;">
                {{ $news->isi }}
            </p>
        </div>
    </div>

    {{-- Bagian Komentar --}}
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <h3 class="fw-bold mb-4 text-primary">💬 Komentar</h3>

            {{-- Komentar yang sudah ada --}}
            @forelse($news->komentars as $komen)
                <div class="border rounded-3 p-3 mb-3 bg-light">
                    <p class="mb-1 fw-bold text-dark">{{ $komen->nama }}</p>
                    <p class="mb-0 text-secondary">{{ $komen->isi }}</p>
                </div>
            @empty
                <p class="text-muted fst-italic">Belum ada komentar. Jadilah yang pertama!</p>
            @endforelse

            <hr class="my-4">

            {{-- Formulir menulis komentar --}}
            <h4 class="fw-semibold mb-3">Tulis Komentar</h4>
            <form method="POST" action="{{ route('comments.store', $news->id) }}" class="needs-validation" novalidate>
                @csrf
                <div class="mb-3">
                    <input type="text" name="nama" class="form-control" placeholder="Nama Anda" required>
                </div>
                <div class="mb-3">
                    <textarea name="isi" class="form-control" rows="4" placeholder="Tulis komentar Anda..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary px-4 rounded-pill">
                    <i class="bi bi-send-fill"></i> Kirim Komentar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
