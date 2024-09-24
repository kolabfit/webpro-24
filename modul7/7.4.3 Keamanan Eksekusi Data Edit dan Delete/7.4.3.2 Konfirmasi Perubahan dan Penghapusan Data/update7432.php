<?php
session_start(); // Mulai sesi

// Koneksi ke database
$mysqli = new mysqli("localhost", "root", "", "modul7");

// Memeriksa apakah data POST ada dan valid
if (isset($_POST['id']) && is_numeric($_POST['id']) && isset($_POST['username'])) {
    $user_id = $_POST['id'];
    $username = $_POST['username'];

    // Simpan data update ke dalam sesi
    $_SESSION['update_user'] = ['id' => $user_id, 'username' => $username];

    // Tampilkan konfirmasi perubahan
    echo "Apakah Anda yakin ingin mengubah username menjadi '$username'?<br>";
    echo "<form method='POST' action='confirm_update.php'>
            <input type='submit' value='Ya'>
          </form>";
    echo "<form method='POST' action='index.php'>
            <input type='submit' value='Batal'>
          </form>";
} else {
    echo "Data tidak valid.";
}
?>
