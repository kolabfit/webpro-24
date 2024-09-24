<?php
// Inisialisasi array produk
$product = [
    ['id' => 1, 'nama' => 'Laptop', 'kategori' => 'Elektronik', 'harga' => 15000000, 'stok' => 10],
    ['id' => 2, 'nama' => 'Smartphone', 'kategori' => 'Elektronik', 'harga' => 5000000, 'stok' => 25],
    ['id' => 3, 'nama' => 'Kursi', 'kategori' => 'Furniture', 'harga' => 750000, 'stok' => 50]
  ];


// Insert new product using array_push
function insertProduct(&$produkArray, $id, $nama, $harga, $kategori, $stok) {
    $newProduct = [
        'id' => $id,
        'nama' => $nama,
        'harga' => $harga,
        'kategori' => $kategori,
        'stok' => $stok
    ];
    
    array_push($produkArray, $newProduct);
}
//Using function
insertProduct($product, 4, 'Jaket Kulit', 350000, 'Pakaian', 15);


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

// Fungsi untuk meng-update produk
// function updateProduk(&$produkArray, $id, $dataBaru) {
//     foreach ($produkArray as &$item) {
//         if ($item['id'] == $id) {
//             $item = array_merge($item, $dataBaru);
//             break;
//         }
//     }
// }

// Fungsi untuk menghapus produk
// function hapusProduk(&$produkArray, $id) {
//     foreach ($produkArray as $index => $item) {
//         if ($item['id'] == $id) {
//             unset($produkArray[$index]);
//             break;
//         }
//     }
// }

// Fungsi untuk mencari produk
// function cariProduk($produkArray, $id) {
//     foreach ($produkArray as $item) {
//         if ($item['id'] == $id) {
//             return $item;
//         }
//     }
//     return null;
// }



// Contoh penggunaan fungsi
// updateProduk($produk, 1, ['harga' => 160000, 'stok' => 40]);
// hapusProduk($produk, 2);

// Mencari produk
// $produkDitemukan = cariProduk($produk, 1);
// if ($produkDitemukan) {
//     echo "Produk ditemukan: " . $produkDitemukan['nama'];
// } else {
//     echo "Produk tidak ditemukan";
// }
?>
