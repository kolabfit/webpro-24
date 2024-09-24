<?php
include 'koneksi.php';

// Query untuk menampilkan daftar kategori barang
$result = $mysqli->query("SELECT * FROM kategori_barang");
?>

<!-- Tombol Input Kategori -->
<h2>Daftar Kategori Barang</h2>
<a href="input_kategori.php">
    <button type="button">Tambah Kategori Baru</button>
</a>

<!-- Tabel Daftar Kategori -->
<table border="1">
    <tr>
        <th>Nama Kategori</th>
        <th>Aksi</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['nama_kategori'] ?></td>
            <td>
                <a href="edit_kategori.php?id=<?= $row['id'] ?>">Edit</a>
                <a href="delete_kategori.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>
