<?php 
// class adalah blueprint untuk menghasilkan sebuah object
// property : diawali dengan {nama: Hudi}
// variable didalam class
// method atau fuction :
//object/instance : menghasilkan sebuah object

class siswa {
   public $nama;
   public $nik;
   public $jurusan;
   public $nilai;

   public function __construct($nama, $nik, $jurusan, $nilai)
   {
      $this->nama = $nama;
      $this->nik = $nik;
      $this->jurusan = $jurusan;
      $this->nilai = $nilai;

      echo "Selamat datang {$this->nama} ({$this->nik}) <br>";
   }

   public function callName()
   {
    return $this->nama;
   } 
   public function getNik()
   {
     return $this->nik;
     }

}

$siswa = new Siswa("Sumala", "314505110410006", "Make up Artist", 52);
$siswa2 = new Siswa("SUS RINI", "314505110410007", "Perhotelan", 15 );

echo "Nama : " . $siswa->nama . "<br>";
echo "Nik : " . $siswa->nik . "<br>";
echo "Jurusan : " . $siswa->jurusan . "<br>";
echo "Nilai : " . $siswa->nilai . "<br>";

?>