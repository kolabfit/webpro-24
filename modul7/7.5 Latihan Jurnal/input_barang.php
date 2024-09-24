<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $id_kategori = $_POST['id_kategori'];
    $harga = $_POST['harga'];

    $stmt = $mysqli->prepare("INSERT INTO barang (nama_barang, id_kategori, harga) VALUES (?, ?, ?)");
    $stmt->bind_param("sid", $nama_barang, $id_kategori, $harga);

    if ($stmt->execute()) {
        echo "Data barang berhasil ditambahkan!";
    } else {
        echo "Gagal menambah barang: " . $stmt->error;
    }
    $stmt->close();
}
?>

<form method="POST">
    Nama Barang: <input type="text" name="nama_barang"><br>
    Kategori: 
    <select name="id_kategori">
        <?php
        $result = $mysqli->query("SELECT * FROM kategori_barang");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['id']}'>{$row['nama_kategori']}</option>";
        }
        ?>
    </select><br>
    Harga: <input type="text" name="harga"><br>
    <input type="submit" value="Tambah Barang">
</form>
