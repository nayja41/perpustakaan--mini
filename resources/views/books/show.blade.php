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

@section('title', 'Detail Buku')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Detail Buku</h4>
                <div>
                    <a href="{{ route('books.edit', $book) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('books.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h2>{{ $book->title }}</h2>
                        <p class="lead">oleh {{ $book->author }}</p>
                        
                        <div class="mb-3">
                            <span class="badge bg-primary">{{ $book->category->name }}</span>
                            <span class="badge {{ $book->stock > 0 ? 'bg-success' : 'bg-danger' }}">
                                Stok: {{ $book->stock }}
                            </span>
                        </div>

                        @if($book->description)
                            <div class="mb-4">
                                <h5>Deskripsi</h5>
                                <p>{{ $book->description }}</p>
                            </div>
                        @endif
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h6 class="card-title">Informasi Buku</h6>
                                <table class="table table-sm">
                                    <tr>
                                        <td><strong>ISBN:</strong></td>
                                        <td>{{ $book->isbn }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Tahun Terbit:</strong></td>
                                        <td>{{ $book->publication_year }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Halaman:</strong></td>
                                        <td>{{ $book->pages }} halaman</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Kategori:</strong></td>
                                        <td>
                                            <a href="{{ route('categories.show', $book->category) }}" class="text-decoration-none">
                                                {{ $book->category->name }}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Stok:</strong></td>
                                        <td>{{ $book->stock }}</td>
                                    </tr>
                                </table>
                                
                                <small class="text-muted">
                                    Ditambahkan: {{ $book->created_at->format('d/m/Y H:i') }}<br>
                                    Diupdate: {{ $book->updated_at->format('d/m/Y H:i') }}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</body>
</html>