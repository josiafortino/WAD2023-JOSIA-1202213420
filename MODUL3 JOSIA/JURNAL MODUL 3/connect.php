<!-- File ini berisi koneksi dengan database yang telah di import ke phpMyAdmin kalian -->


<?php
// Buatlah variable untuk connect ke database yang telah di import ke phpMyAdmin
$host = "localhost:3308";
$user = "root";
$pw = "";
$db_name= "modul3_wad";

// 
  
// Buatlah perkondisian jika tidak bisa terkoneksi ke database maka akan mengeluarkan errornya
$connect = mysqli_connect($host,$user,$pw,$db_name);
if (!$connect){
    die("Koneksi Gagal: " . mysqli_connect_error());
}
// 
?>