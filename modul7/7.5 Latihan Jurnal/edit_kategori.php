<?php
include 'koneksi.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_kategori = $_POST['nama_kategori'];

    $stmt = $mysqli->prepare("UPDATE kategori_barang SET nama_kategori = ? WHERE id = ?");
    $stmt->bind_param("si", $nama_kategori, $id);

    if ($stmt->execute()) {
        echo "Kategori barang berhasil diupdate!";
        header("Location: list_kategori.php"); // Redirect setelah update
        exit();
    } else {
        echo "Gagal update kategori: " . $stmt->error;
    }
    $stmt->close();
}

// Menampilkan data yang akan di-edit
$result = $mysqli->query("SELECT * FROM kategori_barang WHERE id = $id");
$data = $result->fetch_assoc();
?>

<h2>Edit Kategori Barang</h2>
<form method="POST">
    Nama Kategori: <input type="text" name="nama_kategori" value="<?= $data['nama_kategori'] ?>" required><br>
    <input type="submit" value="Update Kategori">
</form>
