<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pengguna</title>
</head>
<body>
    <h1>Edit Data Pengguna</h1>
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

    // Ambil id dari URL
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);

        // Ambil data pengguna dari database berdasarkan id
        $sql = "SELECT username FROM users WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Ambil data pengguna
            $row = $result->fetch_assoc();
            $username = $row['username'];
        } else {
            echo "Data pengguna tidak ditemukan.";
            exit;
        }
    } else {
        echo "ID tidak ditemukan.";
        exit;
    }
    ?>

    <form action="proses_edit.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Masukkan password baru (jika ingin mengubah)">
        <br><br>
        <input type="submit" value="Update">
    </form>

    <?php
    // Tutup koneksi
    $conn->close();
    ?>
</body>
</html>
