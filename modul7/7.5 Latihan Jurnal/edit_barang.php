<?php
include 'koneksi.php';

$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $id_kategori = $_POST['id_kategori'];
    $harga = $_POST['harga'];

    $stmt = $mysqli->prepare("UPDATE barang SET nama_barang = ?, id_kategori = ?, harga = ? WHERE id = ?");
    $stmt->bind_param("sidi", $nama_barang, $id_kategori, $harga, $id);

    if ($stmt->execute()) {
        echo "Data barang berhasil diupdate!";
    } else {
        echo "Gagal update barang: " . $stmt->error;
    }
    $stmt->close();
}

$result = $mysqli->query("SELECT * FROM barang WHERE id = $id");
$data = $result->fetch_assoc();
?>

<form method="POST">
    Nama Barang: <input type="text" name="nama_barang" value="<?= $data['nama_barang'] ?>"><br>
    Kategori: 
    <select name="id_kategori">
        <?php
        $result = $mysqli->query("SELECT * FROM kategori_barang");
        while ($row = $result->fetch_assoc()) {
            $selected = $row['id'] == $data['id_kategori'] ? 'selected' : '';
            echo "<option value='{$row['id']}' $selected>{$row['nama_kategori']}</option>";
        }
        ?>
    </select><br>
    Harga: <input type="text" name="harga" value="<?= $data['harga'] ?>"><br>
    <input type="submit" value="Update Barang">
</form>
