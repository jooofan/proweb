<?php
include 'class_matematika.php'; // Menggunakan tanda kutip tunggal (')
$math = new matematika();
$jari = 10;
$kel_lingkaran = $math->keliling_lingkaran($jari); // Menggunakan tanda panah (->)
$luas_lingkaran = $math->luas_lingkaran($jari); // Menggunakan tanda panah (->)
echo "Menghitung Keliling dan Luas Lingkaran<br>";
echo "Jari-Jari : ".$jari."<br>";
echo "Keliling = ".$kel_lingkaran."<br>";
echo "Luas = ".$luas_lingkaran;
?>
