<?php
session_start(); 
include("../koneksi.php");

//mengecek apakah tombol 'simpan' telah ditekan
if(isset($_POST['simpan'])) {
    /* mengambil nilai dari form input dan menyimpannya ke dalam variabel */
   $judulBuku = $_POST['judulBuku'];
   $penulis = $_POST['penulis'];
   $harga = $_POST['harga'];
    /* menyusun query SQL untuk menambahkan data ke tabel buku */
   $sql = "INSERT INTO buku
   (judulBuku, penulis,harga) 
   VALUES ('$judulBuku','$penulis','$harga')";

   // menjalankan query dan menyimpan hasilnya dalam variabel $query
   $query = mysqli_query($db, $sql);

   // simpan pesan di sesi
   if ($query) {
    $_SESSION['notifikasi'] = "Data buku berhasil ditambahkan!";
   } else {
    $_SESSION['notifikasi'] = "Data buku gagal ditambahkan!";
   }

   //alihkan ke halaman index.php
   header('location: index.php');
} else {
    // jika akses langsung tanpa form, tampilkan pesan error
    die("Akses ditolak...");
}
 ?>