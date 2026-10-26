<!-- 
    operator : memanipulasi nilai dari variable
    +,-,/,*
-->

<?php
    $a = 1;
    $b = 2;

    $jumlah = $a + $b;
    // echo $jumlah;

    $subtotal = 100000;
    $ongkir = 10000;
    $diskon = 10000;

    $totalBayar = ($subtotal + $ongkir) - $diskon;
    echo "Total Bayar : $totalBayar";
    echo "<br>";

    // operator perbandingan : =, ==, ===, != atau <>, !== >, <, <=, >=
    // operator logic : &&, OR || !

 ?>