@extends('admin.layouts.app')
@section('title', 'Edit Kategori')
@section('subtitle', 'Perbarui kategori produk')

@section('content')
  <form action="{{route ('admin.category.update', $category->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="" class="form-label-custom">Nama Lengkap *</label>
      <input type="text" class="form-control" name="name" required value="{{ old('name', $category->name) }}">
      @error('name')
          <div class="invalid-feedback d-block">{{ $message }}</div>
      @enderror
    </div>
        <div class="mb-3">
      <label for="" class="form-label-custom">Slug (Opsional)</label>
      <input type="text" class="form-control" name="slug" required value="{{ old('slug',$category->slug ) }}">
       @error('name')
          <div class="invalid-feedback d-block">{{ $message }}</div>
      @enderror
    </div>
        <div class="mb-3">
      <label for="" class="form-label-custom">Ikon </label>
      <input type="text" class="form-control" name="icon" value="{{ old('icon',$category->slug ) }}">
      @error('icon')
          <div class="invalid-feedback d-block">{{ $message }}</div>
      @enderror
    </div>
        <div class="mb-3">
          <button type="submit" class="btn-custom btn-custom-primary">
            Simpan
          </button>
    </div>
  </form>
@endsection