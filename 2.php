<!--
    '':
    "":
    ``:
  -->

  <?php
  $nama = "hudi mahmudi";
  $namaLengkap = "Budi Sudar Sono";
  echo 'Nama saya adalah $nama';
  echo '<br>';
  echo "Nama saya adalah $nama"; 
  echo '<br>';

  // echo '""';

  //strlen()
  echo "Panjang string: " . strlen($nama);
  echo "<br>";
  //substr :
  echo substr($nama, 0, 5);
  echo "<br>";
  echo str_replace($namaLengkap, "Sudar", "Duarrr");
   ?>