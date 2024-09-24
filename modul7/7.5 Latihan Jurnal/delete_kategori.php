<?php
include 'koneksi.php';

$id = $_GET['id'];
$stmt = $mysqli->prepare("DELETE FROM kategori_barang WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "Kategori barang berhasil dihapus!";
    header("Location: list_kategori.php"); // Redirect setelah delete
    exit();
} else {
    echo "Gagal menghapus kategori: " . $stmt->error;
}
$stmt->close();
?>
