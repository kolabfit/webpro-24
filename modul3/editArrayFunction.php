<?php
// Inisialisasi array produk
$product = [
    ['id' => 1, 'nama' => 'Laptop', 'kategori' => 'Elektronik', 'harga' => 15000000, 'stok' => 10],
    ['id' => 2, 'nama' => 'Smartphone', 'kategori' => 'Elektronik', 'harga' => 5000000, 'stok' => 25],
    ['id' => 3, 'nama' => 'Kursi', 'kategori' => 'Furniture', 'harga' => 750000, 'stok' => 50]
  ];

function updateProduct(&$produkArray, $id, $newData) {
    foreach ($produkArray as &$item) {
        if ($item['id'] == $id) {
            $item = array_merge($item, $newData);
            break;
        }
    }
}

updateProduct($product, 1, ['nama' => "Laptop Lenovo Legion"]);


function viewProduct($produkArray) {
    foreach ($produkArray as $item) {
        echo "ID: " . $item['id']."<br>"; 
        echo"Nama: " . $item['nama']."<br>";
        echo"Harga: Rp ".$item['harga']."<br>";
        echo"Stock: ".$item['stok']."<br>";
    }
}
//Memanggil fungsi tampil data array
viewProduct($product);

?>