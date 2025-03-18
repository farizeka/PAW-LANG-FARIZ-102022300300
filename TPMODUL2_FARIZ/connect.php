<?php
// ==================1==================
// Definisikan variabel2 yang akan digunakan untuk melakukan koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_perpustakaan";


// ==================2==================
// Definisikan $conn untuk melakukan koneksi ke database 
$conn = mysqli_connect($host, $user,$pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>