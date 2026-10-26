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

  <form action="{{route ('actionTambah')}}" method="post">
    @csrf
    <br><br>
     <div class="form-group">
      <label for="">Angka 1</label>
      <input type="number" name="angka1" placeholder="Masukkan angka">
    </div>
    <br>
    <div class="form-group">
      <label for="">Angka 2</label>
      <input type="number" name="angka2" placeholder="Masukkan angka">
    </div>
    <br>
    <div class="from-group">
      <button type="submit">Jumlahkan</button>
    </div>
  </form>
  <br>
  <h1>Hasilnya adalah {{ $jumlah ?? 0}}</h1>
</body>
</html>