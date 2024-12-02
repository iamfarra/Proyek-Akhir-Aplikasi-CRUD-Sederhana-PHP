<?php

session_start(); 
include("../koneksi.php");

if (isset($_POST['simpan'])) {
    
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pelanggan_id = $_POST['pelanggan_id'];
    
    $sql = "UPDATE pelanggan SET
    nama='$nama',
    email='$email'
    WHERE pelanggan_id=$pelanggan_id";
 
    $query = mysqli_query($db, $sql);

    if ($query) {
        $_SESSION['notifikasi'] = "Data pelanggan berhasil diperbarui!";
    } else {
        $_SESSION['notifikasi'] = "Data pelanggan gagal diperbarui!";
    }

    header('Location: index.php');
} else {
    die("Akses ditolak...");
}
?>