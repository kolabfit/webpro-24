<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_kategori = $_POST['nama_kategori'];

    $stmt = $mysqli->prepare("INSERT INTO kategori_barang (nama_kategori) VALUES (?)");
    $stmt->bind_param("s", $nama_kategori);

    if ($stmt->execute()) {
        echo "Kategori barang berhasil ditambahkan!";
        header("Location: list_kategori.php"); // Redirect setelah input
        exit();
    } else {
        echo "Gagal menambah kategori: " . $stmt->error;
    }
    $stmt->close();
}
?>

<h2>Input Kategori Barang</h2>
<form method="POST">
    Nama Kategori: <input type="text" name="nama_kategori" required><br>
    <input type="submit" value="Tambah Kategori">
</form>
