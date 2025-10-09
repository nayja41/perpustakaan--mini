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

@section('title', 'Daftar Buku')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Daftar Buku</h2>
    <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah Buku</a>
</div>

<!-- Form Pencarian -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('books.index') }}">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="search" class="form-control" 
                           placeholder="Cari berdasarkan judul, penulis, atau ISBN..." 
                           value="{{ request('search') }}">
                </div>
                <div class="col-md-4">
                    <select name="category_id" class="form-select">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" 
                                    {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-outline-primary w-100">Cari</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Kategori</th>
                        <th>Tahun</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $index => $book)
                        <tr>
                            <td>{{ $books->firstItem() + $index }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>
                                <span class="badge bg-secondary">{{ $book->category->name }}</span>
                            </td>
                            <td>{{ $book->publication_year }}</td>
                            <td>
                                <span class="badge {{ $book->stock > 0 ? 'bg-success' : 'bg-danger' }}">
                                    {{ $book->stock }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-info">Detail</a>
                                    <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data buku</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        {{ $books->appends(request()->query())->links() }}
    </div>
</div>
@endsection 
</body>
</html>