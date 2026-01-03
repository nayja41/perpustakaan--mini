@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 flex-column flex-md-row">
    <h2 class="mb-2 mb-md-0">Daftar Kategori</h2>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Tambah Kategori</a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" class="text-nowrap">No</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col" class="text-nowrap">Jumlah Buku</th>
                        <th scope="col" class="text-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $index => $category)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="text-nowrap">{{ $category->name }}</td>
                            <td>
                                <span class="d-md-inline d-block">{{ Str::limit($category->description, 50) }}</span>
                            </td>
                            <td class="text-nowrap">
                                <span class="badge bg-info">{{ $category->books_count }} buku</span>
                            </td>
                            <td class="text-nowrap">
                                <div class="btn-group btn-group-sm" role="group" aria-label="Aksi">
                                    <a href="{{ route('categories.show', $category) }}" class="btn btn-info">Detail</a>
                                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">
                                <em>Tidak ada data kategori</em>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection