<?php
// Mengambil data dari formulir
$nama = $_POST['nama'];
$email = $_POST['email'];

// Validasi data
$errors = [];

if (empty($nama)) {
    $errors[] = 'Nama tidak boleh kosong.';
}

if (empty($email)) {
    $errors[] = 'Email tidak boleh kosong.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Format email tidak valid.';
}

// Menampilkan pesan kesalahan jika ada
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo '<p style="color: red;">' . htmlspecialchars($error) . '</p>';
    }
} else {
    // Proses data jika tidak ada kesalahan
    echo '<p>Data berhasil dikirim!</p>';
    echo '<p>Nama: ' . htmlspecialchars($nama) . '</p>';
    echo '<p>Email: ' . htmlspecialchars($email) . '</p>';
}
?>
