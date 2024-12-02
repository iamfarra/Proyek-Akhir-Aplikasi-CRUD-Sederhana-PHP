<?php

//menentukan nama localhost
$server = "localhost";
//nama pengguna mysql (default: root)
$user = "root";
//kata sandi untuk pengguna mysql (default: kosong )
$password = "";
//nama basis data yang akan dihubungkan
$nama_database = "bookstore";

//membuat koneksi ke basis data
$db = mysqli_connect($server, $user, $password, $nama_database);

//periksa apakah koneksi berhasil   
if (!$db) {
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
?> 