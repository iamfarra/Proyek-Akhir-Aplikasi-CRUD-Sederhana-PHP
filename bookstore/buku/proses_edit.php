<?php

session_start(); 
include("../koneksi.php");

if (isset($_POST['simpan'])) {
    // ambil data dari form
    $buku = $_POST['buku_id'];
    $judulBuku = $_POST['judulBuku'];
    $penulis = $_POST['penulis'];
    $harga = $_POST['harga'];

    // buat query untuk memperbarui data buku
    $sql = "UPDATE buku SET
    judulBuku='$judulBuku',
    penulis='$penulis',
    harga='$harga'
    WHERE buku_id=$buku";
    $query = mysqli_query($db, $sql);

    //simpan pesan notifikasi dalam sesi berdasarkan hasil query
    if ($query) {
        $_SESSION['notifikasi'] = "Data buku berhasil diperbarui!";
    } else {
        $_SESSION['notifikasi'] = "Data buku gagal diperbarui!";
    }

    header('Location: index.php');
} else {
    // jika akses langsung tanpa form, tampilkan pesan error
    die("Akses ditolak...");
}
?>