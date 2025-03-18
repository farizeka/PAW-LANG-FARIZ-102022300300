<?php
include 'connect.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID tidak valid!");
}

$id = intval($_GET['id']); 


$stmt = $conn->prepare("DELETE FROM tb_buku WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    header("Location: katalog_buku.php");
    exit(); 
} else {
    echo "<script>alert('Data gagal dihapus atau tidak ditemukan');</script>";
}

$stmt->close();
$conn->close();
?>
