@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="card shadow-sm border-0">
                <!-- Header -->
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 fw-bold">
                        📘 Detail Buku
                    </h4>
                    <div>
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-warning btn-sm">
                            ✏️ Edit
                        </a>
                        <a href="{{ route('books.index') }}" class="btn btn-outline-secondary btn-sm">
                            ⬅ Kembali
                        </a>
                    </div>
                </div>

                <!-- Body -->
                <div class="card-body">
                    <div class="row g-4">

                        <!-- KIRI -->
                        <div class="col-md-8">
                            <h2 class="fw-bold">{{ $book->title }}</h2>
                            <p class="text-muted mb-2">
                                oleh <strong>{{ $book->author }}</strong>
                            </p>

                            <div class="mb-3">
                                <span class="badge bg-primary">
                                    {{ $book->category->name }}
                                </span>

                                <span class="badge {{ $book->stock > 0 ? 'bg-success' : 'bg-danger' }}">
                                    {{ $book->stock > 0 ? 'Tersedia' : 'Habis' }}
                                </span>
                            </div>

                            @if($book->description)
                                <div class="mt-4">
                                    <h5 class="fw-semibold">📝 Deskripsi</h5>
                                    <p class="text-secondary">
                                        {{ $book->description }}
                                    </p>
                                </div>
                            @endif
                        </div>

                        <!-- KANAN -->
                        <div class="col-md-4">
                            <div class="card bg-light border-0 shadow-sm">
                                <div class="card-body">
                                    <h6 class="fw-bold mb-3">📌 Informasi Buku</h6>

                                    <table class="table table-sm table-borderless mb-3">
                                        <tr>
                                            <td class="text-muted">ISBN</td>
                                            <td class="fw-semibold">{{ $book->isbn }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Tahun Terbit</td>
                                            <td>{{ $book->publication_year }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Halaman</td>
                                            <td>{{ $book->pages }} halaman</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Kategori</td>
                                            <td>
                                                <a href="{{ route('categories.show', $book->category) }}"
                                                   class="text-decoration-none fw-semibold">
                                                    {{ $book->category->name }}
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Stok</td>
                                            <td>
                                                <span class="badge {{ $book->stock > 0 ? 'bg-success' : 'bg-danger' }}">
                                                    {{ $book->stock }}
                                                </span>
                                            </td>
                                        </tr>
                                    </table>

                                    <small class="text-muted">
                                        🕒 Ditambahkan: {{ $book->created_at->format('d M Y, H:i') }} <br>
                                        🔄 Diupdate: {{ $book->updated_at->format('d M Y, H:i') }}
                                    </small>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
