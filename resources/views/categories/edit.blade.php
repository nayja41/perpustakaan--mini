@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">

            <div class="card shadow-sm border-0">
                <!-- Header -->
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0 fw-bold">
                        ✏️ Edit Kategori
                    </h4>
                    <small class="text-muted">
                        {{ $category->name }}
                    </small>
                </div>

                <!-- Body -->
                <div class="card-body">
                    <form action="{{ route('categories.update', $category) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Nama Kategori -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Nama Kategori
                            </label>
                            <input
                                type="text"
                                name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $category->name) }}"
                                placeholder="Masukkan nama kategori"
                                required
                            >
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                Deskripsi
                            </label>
                            <textarea
                                name="description"
                                rows="4"
                                class="form-control @error('description') is-invalid @enderror"
                                placeholder="Deskripsi kategori (opsional)"
                            >{{ old('description', $category->description) }}</textarea>

                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Action -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('categories.index') }}"
                               class="btn btn-outline-secondary">
                                ⬅ Kembali
                            </a>

                            <button type="submit" class="btn btn-primary">
                                💾 Update Kategori
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
