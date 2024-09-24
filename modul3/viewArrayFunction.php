<?php
//Struktur array
$produk = [
    ['id' => 1, 'nama' => 'Laptop', 'kategori' => 'Elektronik', 'harga' => 15000000, 'stok' => 10],
    ['id' => 2, 'nama' => 'Smartphone', 'kategori' => 'Elektronik', 'harga' => 5000000, 'stok' => 25],
    ['id' => 3, 'nama' => 'Kursi', 'kategori' => 'Furniture', 'harga' => 750000, 'stok' => 50]
  ];

// Fungsi untuk menampilkan produk
function viewProduct($produkArray) {
    foreach ($produkArray as $item) {
        echo "ID: " . $item['id']."<br>"; 
        echo"Nama: " . $item['nama']."<br>";
        echo"Harga: Rp ".$item['harga']."<br>";
        echo"Stock: ".$item['stok']."<br>";
    }
}
//Memanggil fungsi tampil data array
viewProduct($produk);
?>