<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "modul7");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data pengguna
$sql = "SELECT id, username FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hapus Pengguna</title>
</head>
<body>
    <h1>Hapus Pengguna</h1>
    <form action="delete.php" method="POST">
        <label for="user_id">Pilih Pengguna:</label>
        <select name="user_id" id="user_id">
            <?php while($row = $result->fetch_assoc()): ?>
                <option value="<?= $row['id']; ?>"><?= $row['username']; ?></option>
            <?php endwhile; ?>
        </select>
        <button type="submit">Hapus</button>
    </form>
</body>
</html>

<?php
$conn->close();
?>
