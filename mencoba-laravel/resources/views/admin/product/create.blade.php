@extends('admin.layouts.app')
@section('title', 'Tambah Produk');
@section('subtitle', 'Tambahkan produk baru untuk ditampilkan di PPKD Sticker')

@section('content')
    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label-custom">Nama Produk</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="" class="form-label">Slug (optional)</label>
                    <input type="text" class="form-control" name="slug" required value="{{ old('stock') }}">
                    @error('stock')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="" class="form-label">Kategori</label>
                    <select name="category_id" id="" class="form-select">
                        <option value="">Pilih Kategori</option>
                        @foreach ($categories as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
        </div>

        <div class="mb-3">
            <label for="">Deskripsi Singkat</label>
            <textarea name="brief_description" id="" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="">Deskripsi</label>
            <!-- //editor Untuk manggil Quill -->
            <textarea name="description" cols="30" rows="10" class="d-none form-control"></textarea>
            <div id="editor">{!! old('description') !!} </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <div class="mb-3">
                    <label for="">Harga</label>
                    <input type="number" class="form-control" name="price">
                </div>
            </div>

            <div class="col-sm-3">
                <div class="mb-3">
                    <label for="">Harga Art Cartoon</label>
                    <input type="number" class="form-control" name="price_art_cartoon">
                </div>
            </div>

            <div class="col-sm-3">
                <div class="mb-3">
                    <label for="">Harga Art Paper</label>
                    <input type="number" class="form-control" name="price_art_paper">
                </div>
            </div>

            <div class="col-sm-3">
                <div class="mb-3">
                    <label for="">Harga Hvs</label>
                    <input type="number" class="form-control" name="price_art_hvs">
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-3">
                <div class="mb-3">
                    <label for="" class="form-label">Harga Laminating doft</label>
                    <input type="number" class="form-control" name="price_doft">
                </div>
            </div>

            <div class="col-sm-3">
                <div class="mb-3">
                    <label for="" class="form-label">Harga Laminating Glossy</label>
                    <input type="number" class="form-control" name="price_glossy">
                </div>
            </div>

            <div class="col-sm-3">
                <div class="mb-3">
                    <label for="" class="form-label">Harga Potong (Min 5x5 cm)</label>
                    <input type="number" class="form-control" name="cutting_price">
                </div>
            </div>

        </div>

        <div class="mb-3">
            <label for="" class="form-label-custom">Gambar Produk</label>
            <input type="file" class="form-control" name="images[]">
        </div> 
        
        <div>
            <button type="submit" class="btn-custom btn-custom-primary">Simpan</button>
            <a href="{{ url()->previous() }}" class="btn-custom btn-custom-warning">Kembali</a>
        </div>
    </form>
@endsection