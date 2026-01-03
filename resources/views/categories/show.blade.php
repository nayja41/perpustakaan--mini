@extends('layouts.app')

@section('title', 'Detail Kategori')

@section('content')
<div class="container">
    <div class="row g-4">

        <!-- INFO KATEGORI -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0 fw-bold">📂 Detail Kategori</h5>
                </div>

                <div class="card-body d-flex flex-column">
                    <h3 class="fw-bold mb-2">{{ $category->name }}</h3>

                    <p class="text-muted flex-grow-1">
                        {{ $category->description ?: 'Tidak ada deskripsi kategori.' }}
                    </p>

                    <div class="mb-3">
                        <span class="badge bg-info text-dark">
                            📚 {{ $category->books_count }} Buku
                        </span>
                    </div>

                    <hr>

                    <small class="text-muted">
                        🕒 Dibuat: {{ $category->created_at->format('d M Y, H:i') }}
                    </small>

                    <div class="d-flex gap-2 mt-4">
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning w-100">
                            ✏️ Edit
                        </a>
                        <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary w-100">
                            ⬅ Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- DAFTAR BUKU -->
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">
                        📘 Buku dalam Kategori
                        <span class="text-primary">"{{ $category->name }}"</span>
                    </h5>

                    <a href="{{ route('books.create') }}" class="btn btn-sm btn-primary">
                        ➕ Tambah Buku
                    </a>
                </div>

                <div class="card-body">
                    @if($category->books_count > 0)
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Judul</th>
                                        <th>Penulis</th>
                                        <th class="text-nowrap">Tahun</th>
                                        <th>Stok</th>
                                        <th class="text-nowrap">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($category->books as $index => $book)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td class="fw-semibold">{{ $book->title }}</td>
                                            <td>{{ $book->author }}</td>
                                            <td>{{ $book->publication_year }}</td>
                                            <td>
                                                @if($book->stock > 0)
                                                    <span class="badge bg-success">
                                                        Tersedia ({{ $book->stock }})
                                                    </span>
                                                @else
                                                    <span class="badge bg-danger">Habis</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('books.show', $book) }}"
                                                   class="btn btn-sm btn-outline-info">
                                                    👁 Detail
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <p class="text-muted mb-3">
                                📭 Belum ada buku pada kategori ini
                            </p>
                            <a href="{{ route('books.create') }}" class="btn btn-primary">
                                ➕ Tambah Buku Pertama
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
