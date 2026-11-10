@extends('admin.layouts.app')
@section('title', 'Edit Kategori');
@section('subtitle', 'Perbarui kategori blog')

@section('content')
    <form action="{{ route('admin.category_blog.update', $categoryBlog->id) }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label-custom">Nama Kategori *</label>
            <select name="blo_category_id" id="" class="form-control">
              @foreach ($categories as $category )
               <option {{ $blog->blog_category_id === $category_id ? 'selected' : '' }} value=" {{ $category->id }} > {{ $category->name }}"></option>
              @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label-custom">Slug (Opsional) </label>
            <input type="text" class="form-control" name="slug" value="{{ old('slug', $categoryBlog->slug) }}">
            @error('slug')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
          <div class="row">
            <div class="col-6">
              <label for="" class="form-label-custom">Cover Path</label>
              <input type="file">
            </div>
            <div class="col-6">
              <label for="" class="form-label-custom">Cover Path Exsiting</label>
              <img src="{{ asset('storage/' . $blog->cover_path) }}" alt="">
            </div>
          </div>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn-custom btn-custom-primary">
                Simpan
            </button>
            <a href="{{ url()->previous() }}" class="btn-custom btn-custom-secondary">Kembali</a>
        </div>
    </form>
@endsection