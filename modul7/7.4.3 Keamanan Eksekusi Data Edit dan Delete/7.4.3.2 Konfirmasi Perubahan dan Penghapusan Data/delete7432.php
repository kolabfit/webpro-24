<?php
session_start(); // Mulai sesi

// Koneksi ke database
$mysqli = new mysqli("localhost", "root", "", "modul7");

// Memeriksa apakah data POST ada dan valid
if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    $user_id = $_POST['id'];

    // Simpan ID untuk penghapusan dalam sesi
    $_SESSION['delete_id'] = $user_id;

    // Tampilkan konfirmasi penghapusan
    echo "Apakah Anda yakin ingin menghapus user ini?<br>";
    echo "<form method='POST' action='confirm_delete.php'>
            <input type='submit' value='Ya'>
          </form>";
    echo "<form method='POST' action='index.php'>
            <input type='submit' value='Batal'>
          </form>";
} else {
    echo "ID tidak valid.";
}
?>
