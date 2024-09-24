<?php
// Koneksi ke database
$mysqli = new mysqli("localhost", "username", "password", "database_name");

// Memeriksa apakah data POST ada dan valid
if (isset($_POST['id']) && is_numeric($_POST['id']) && isset($_POST['username'])) {
    $user_id = $_POST['id'];
    $username = $_POST['username'];

    // Update data user berdasarkan ID
    $stmt = $mysqli->prepare("UPDATE users SET username = ? WHERE id = ?");
    $stmt->bind_param("si", $username, $user_id);
    if ($stmt->execute()) {
        echo "Data berhasil diperbarui.";
    } else {
        echo "Gagal memperbarui data.";
    }
} else {
    echo "Data tidak valid.";
}
?>
