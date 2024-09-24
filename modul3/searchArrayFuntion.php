<?php
$product = [
    ['id' => 1, 'nama' => 'Laptop', 'kategori' => 'Elektronik', 'harga' => 15000000, 'stok' => 10],
    ['id' => 2, 'nama' => 'Smartphone', 'kategori' => 'Elektronik', 'harga' => 5000000, 'stok' => 25],
    ['id' => 3, 'nama' => 'Kursi', 'kategori' => 'Furniture', 'harga' => 750000, 'stok' => 50]
  ];

function searchProduct($produkArray, $id) {
    foreach ($produkArray as $item) {
        if ($item['id'] == $id) {
            return $item;
        }
    }
    return null;
}

$productFound = searchProduct($product, 2);
if ($productFound) {
    echo "Produk ditemukan: " . $productFound['nama'];
} else {
    echo "Produk tidak ditemukan";
}


?>