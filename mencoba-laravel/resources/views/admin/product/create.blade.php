@extends('admin.layouts.app')
@section('title', 'Tambah Produk');
@section('subtitle', 'Buat produk baru')

@section('content')
    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label-custom">Kategori</label>
            <select name="category_id" id="" class="form-select">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label-custom">Nama Produk</label>
            <input type="text" class="form-control" name="name" required value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label-custom">Stok</label>
            <input type="number" class="form-control" name="stock" required value="{{ old('stock') }}">
            @error('stock')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label-custom">Harga</label>
            <input type="number" class="form-control" name="price" required value="{{ old('price') }}">
            @error('price')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label-custom">Gambar Produk</label>
            <input type="file" class="form-control" name="image" required value="{{ old('image') }}">
            @error('image')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-custom btn-custom-primary">Simpan</button>
        <a href="{{ url()->previous() }}" class="btn-custom btn-custom-warning">Kembali</a>
    @endsection