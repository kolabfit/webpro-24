<?php
include 'koneksi.php';

$id = $_GET['id'];
$stmt = $mysqli->prepare("DELETE FROM barang WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "Data barang berhasil dihapus!";
} else {
    echo "Gagal menghapus barang: " . $stmt->error;
}
$stmt->close();
?>
