<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'Mencoba Laravel' }}</title>
</head>
<body>
  <h1>Mencoba Matematika dasar</h1>
  <a href="{{ route('tambah')}}"> Tambah-tambahan</a>
  <a href="{{ route('kurang')}}"> Pengurangan</a>
  <a href="{{ route('bagi')}}"> Pembagian</a>
  <a href="{{ route('perkalian')}}"> Perkalian</a>

  <a href="{{ url()->previous() }}">Kembali</a>
</body>
</html>