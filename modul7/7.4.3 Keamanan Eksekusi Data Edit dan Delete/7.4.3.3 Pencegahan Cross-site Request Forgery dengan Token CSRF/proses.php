<?php
session_start(); // Memulai sesi

// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "modul7");

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Cek apakah token CSRF valid
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Token CSRF tidak valid.");
    }

    // Tangkap data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek apakah username sudah ada di database
    $sql_cek = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($koneksi, $sql_cek);

    if (mysqli_num_rows($result) > 0) {
        echo "Username sudah terdaftar!";
    } else {
        // Hash password
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        // Query untuk menyimpan data pengguna baru
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password_hash')";

        // Eksekusi query
        if (mysqli_query($koneksi, $sql)) {
            echo "Registrasi berhasil!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
        }
    }
}

// Tutup koneksi
mysqli_close($koneksi);
?>
