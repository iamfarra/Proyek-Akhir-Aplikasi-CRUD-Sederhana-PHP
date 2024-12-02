<?php
session_start(); 
include("../koneksi.php");

//periksa apakah id yang dikirim melalui URL
if (isset($_GET['buku_id'])) {
    //ambil id dari url
    $buku= $_GET['buku_id'];

    //buat query untuk menghapus data buku berdasarkan id
    $sql = "DELETE FROM buku WHERE buku_id=$buku";
    $query = mysqli_query($db, $sql);

    //simpan pesan notifikasi dalam sesi berdasarkan hasil query
    if ($query) {
        $_SESSION['notifikasi'] = "Data buku berhasil dihapus!";
    } else {
        $_SESSION['notifikasi'] = "Data buku gagal dihapus!";
    }

    header('Location: index.php');
} else {
    //jika akses langsung tanpa id, tampilkan pesan eror
    die("Akses ditolak...");
}
?>