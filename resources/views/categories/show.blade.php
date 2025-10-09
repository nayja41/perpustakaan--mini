<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')

@section('title', 'Detail Kategori')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5>Detail Kategori</h5>
            </div>
            <div class="card-body">
                <h4>{{ $category->name }}</h4>
                <p class="text-muted">{{ $category->description ?: 'Tidak ada deskripsi' }}</p>
                <hr>
                <p><strong>Jumlah Buku:</strong> {{ $category->books->count() }} buku</p>
                <p><strong>Dibuat:</strong> {{ $category->created_at->format('d/m/Y H:i') }}</p>
                
                <div class="d-flex gap-2">
                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>Daftar Buku dalam Kategori "{{ $category->name }}"</h5>
            </div>
            <div class="card-body">
                @if($category->books->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Tahun</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($category->books as $index => $book)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $book->title }}</td>
                                        <td>{{ $book->author }}</td>
                                        <td>{{ $book->publication_year }}</td>
                                        <td>
                                            <span class="badge {{ $book->stock > 0 ? 'bg-success' : 'bg-danger' }}">
                                                {{ $book->stock }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-info">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-4">
                        <p class="text-muted">Belum ada buku dalam kategori ini</p>
                        <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah Buku</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
</body>
</html>