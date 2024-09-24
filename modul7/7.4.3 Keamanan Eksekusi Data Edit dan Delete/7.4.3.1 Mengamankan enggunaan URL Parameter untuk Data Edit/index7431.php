<?php
// Koneksi ke database
$mysqli = new mysqli("localhost", "root", "", "modul7");


// Memeriksa apakah parameter ID ada dan valid (angka)
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user_id = $_GET['id'];

    // Melakukan query untuk mendapatkan data user berdasarkan ID
    $stmt = $mysqli->prepare("SELECT id, username FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Memeriksa apakah user ditemukan
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Tampilkan form edit data user
        echo "<form method='POST' action='update.php'>
                <input type='hidden' name='id' value='" . $user['id'] . "'>
                Username: <input type='text' name='username' value='" . $user['username'] . "'>
                <input type='submit' value='Update'>
              </form>";
    } else {
        echo "User tidak ditemukan.";
    }
} else {
    echo "ID tidak valid.";
}
?>
