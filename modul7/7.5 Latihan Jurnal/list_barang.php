<?php
include 'koneksi.php';

// Query untuk menampilkan daftar barang
$result = $mysqli->query("SELECT barang.*, kategori_barang.nama_kategori FROM barang LEFT JOIN kategori_barang ON barang.id_kategori = kategori_barang.id");
?>

<!-- Tombol Input Barang -->
<h2>Daftar Barang</h2>
<a href="input_barang.php">
    <button type="button">Tambah Barang Baru</button>
</a>

<!-- Tabel Daftar Barang -->
<table border="1">
    <tr>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Aksi</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['nama_barang'] ?></td>
            <td><?= $row['nama_kategori'] ?></td>
            <td><?= $row['harga'] ?></td>
            <td>
                <a href="edit_barang.php?id=<?= $row['id'] ?>">Edit</a>
                <a href="delete_barang.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>
