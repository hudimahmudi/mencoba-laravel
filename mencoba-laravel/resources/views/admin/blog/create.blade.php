@extends('admin.layouts.app')
@section('title', 'Tambah Blog');
@section('subtitle', 'Tambah Blog Baru')

@section('content')
    <form action="{{ route('admin.blog.store') }}" method="post" >
        @csrf
        <div class="mb-3">
            <label for="" class="form-label-custom">Nama Kategori *</label>
            <select type="text" class="form-control" name="blog_category_id" required value="{{ old('blog_category_id') }}">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
            @error('blog_category_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="" class="form-label-custom">Judul Blog *</label>
            <input type="text" class="form-control" name="name" value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label-custom">Slug (Opsional) </label>
            <input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
            @error('slug')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label-custom">Deskripsi Singkat (Opsional) </label>
            <input type="text" class="form-control" name="brief_Descriptiom" value="{{ old('brief_description') }}">
            @error('brief_description')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label-custom">isi </label>
            <textarea name="content" cols="30" rows="10" class="d-none"></textarea>
            <div id="editor">{!! old('content') !!}</div>
            @error('content')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label-custom">Author </label>
            <input type="text" class="form-control" name="author" value="{{ auth()->user()->name }}">
            @error('author')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <button type="submit" class="btn-custom btn-custom-primary">
                Simpan
            </button>
            <a href="{{ url()->previous() }}" class="btn-custom btn-custom-warning">Kembali</a>
        </div>
    </form>
@endsection