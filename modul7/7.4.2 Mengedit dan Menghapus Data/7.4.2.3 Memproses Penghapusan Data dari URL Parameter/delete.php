<?php
// Koneksi ke database
$host = 'localhost'; // Ganti dengan host database Anda
$user = 'root'; // Ganti dengan username database Anda
$pass = ''; // Ganti dengan password database Anda
$db = 'modul7'; // Ganti dengan nama database Anda

// Buat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Periksa apakah ID ada di URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Hapus data berdasarkan ID
    $sql = "DELETE FROM users WHERE id = $id";

    // Eksekusi query
    if ($conn->query($sql) === TRUE) {
        echo "Data pengguna berhasil dihapus.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "ID tidak ditemukan.";
}

// Tutup koneksi
$conn->close();
?>
