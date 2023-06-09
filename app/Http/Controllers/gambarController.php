<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class gambarController extends Controller
{
// Simpan gambar yang diterima ke folder tujuan
function simpanGambar(Request $request) {
    $imageDataAll = $request->input('upImages');

 // Path folder tujuan gambar
 $folderPath = 'shop_images/'.'id_container2/';

 // // Membuat folder jika belum ada
 // Storage::makeDirectory($folderPath);
 // Cek apakah folder sudah ada sebelumnya
if (!is_dir($folderPath)) {
 // Membuat folder
 if (mkdir($folderPath, 0775, true)) {
     echo "Folder berhasil dibuat: " . $folderPath;
 } else {
     echo "Gagal membuat folder: " . $folderPath;
 }
} else {
 echo "Folder sudah ada: " . $folderPath;
}

foreach ($imageDataAll as $image) {
  $src = $image['src'];
  $nama = $image['nama'];

    // $imageData = $request->input('gambar');
    // $imageName= $request->input('nama');
    echo "console.log('taek1')";
    // $imageData = 'dgdfg';
  // Mendapatkan data base64 dari URL gambar
//   $base64Data = explode(',', $imageData)[1];

  // Decode base64 menjadi data biner gambar
  $image = base64_decode($src);
  echo "console.log('taek2')";
  // Generate nama file baru
  $timestamp = time();
  // $fileName = "gambar_$timestamp.png";
  $fileName = $nama;
  


 
  
  echo "console.log('taek')";
  // Simpan gambar ke folder tujuan
  file_put_contents($folderPath . $fileName, $image);

  //   return $fileName;
  // } else {
  //   return false;
  // }
  }




// // Tangkap data POST
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['imageData'])) {
//   $imageData = $_POST['imageData'];
  
//   // Simpan gambar
//   $fileName = simpanGambar($imageData);
  
//   if ($fileName) {
//     echo "Gambar berhasil disimpan di server dengan nama file: $fileName";
//   } else {
//     echo "Terjadi kesalahan saat menyimpan gambar";
//   }
// } else {
//   echo "Permintaan tidak valid";
// }

}
}