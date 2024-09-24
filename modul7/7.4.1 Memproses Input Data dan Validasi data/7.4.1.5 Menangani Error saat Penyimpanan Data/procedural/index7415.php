<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "modul7");

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
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

    // Eksekusi query dan menangani error jika terjadi
    if (mysqli_query($koneksi, $sql)) {
        echo "Registrasi berhasil!";
    } else {
        // Tangani error duplikasi username
        if (mysqli_errno($koneksi) == 1062) {
            echo "Error: Username '$username' sudah terdaftar!";
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    }
}

// Tutup koneksi
mysqli_close($koneksi);
?>
