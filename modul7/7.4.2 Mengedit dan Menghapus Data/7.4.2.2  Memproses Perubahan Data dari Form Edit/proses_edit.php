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

// Cek jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    // Jika password baru diisi, hash password sebelum menyimpan
    if (!empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET username='$username', password='$hashedPassword' WHERE id=$id";
    } else {
        // Jika password tidak diubah, update hanya username
        $sql = "UPDATE users SET username='$username' WHERE id=$id";
    }

    // Eksekusi query
    if ($conn->query($sql) === TRUE) {
        echo "Data pengguna berhasil diperbarui.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Tutup koneksi
$conn->close();
?>
