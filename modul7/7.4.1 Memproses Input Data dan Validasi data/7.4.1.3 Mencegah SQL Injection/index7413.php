<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "modul7";

$conn = new mysqli($servername, $username, $password, $dbname);


// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa apakah data dikirim melalui POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Prepared statement untuk menghindari SQL Injection
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);

    // Eksekusi query
    $stmt->execute();
    $stmt->store_result();

    // Memeriksa apakah username ada dalam database
    if ($stmt->num_rows > 0) {
        // Bind hasilnya ke variabel
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // Verifikasi password
        if (password_verify($pass, $hashed_password)) {
            echo "Login berhasil! Selamat datang, " . htmlspecialchars($user) . "!";
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Username tidak ditemukan!";
    }

    // Tutup statement dan koneksi
    $stmt->close();
}

$conn->close();
?>
