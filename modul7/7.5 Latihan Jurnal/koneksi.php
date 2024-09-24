<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "modul7";

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}
?>
