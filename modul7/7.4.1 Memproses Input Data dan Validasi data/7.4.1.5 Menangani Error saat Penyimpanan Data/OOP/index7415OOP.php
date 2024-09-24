<?php
// Koneksi ke database menggunakan OOP
$koneksi = new mysqli("localhost", "root", "", "modul7");

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Tangkap data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Cek apakah username sudah ada di database
$sql_cek = "SELECT * FROM users WHERE username='$username'";
$result = $koneksi->query($sql_cek);

if ($result->num_rows > 0) {
    echo "Username sudah terdaftar!";
} else {
    // Hash password
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    // Query untuk menyimpan data pengguna baru
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password_hash')";

    // Eksekusi query dan tangani error jika terjadi
    if ($koneksi->query($sql) === TRUE) {
        echo "Registrasi berhasil!";
    } else {
        // Tangani error duplikasi username
        if ($koneksi->errno == 1062) {
            echo "Error: Username '$username' sudah terdaftar!";
        } else {
            echo "Error: " . $koneksi->error;
        }
    }
}

// Tutup koneksi
$koneksi->close();
?>
