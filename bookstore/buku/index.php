<?php
//menghubungkan file koneksi dengan folder
include("../koneksi.php");
//memulai sesi
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>apk toko buku</title>
    <!-- membuat styling -->
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
        }
    </style>
</head>
<body>
    <ul>
        <li><a href="../buku/index.php">Data Buku</a></li>
        <li><a href="../pelanggan/index.php">Data pelanggan</a></li>
    </ul>

    <h2>Data Buku</h2>
    <!-- tampilkan notifikasi -->
    <?php if(isset($_SESSION['notifikasi'])): ?>
    <p><?php echo $_SESSION['notifikasi']; ?></p>
    <!-- menghapus notifikasi setelah ditampilkan -->
    <?php unset($_SESSION['notifikasi']); ?>
    <?php endif; ?>

    <table>
        <thead>
            <tr align="center">
                <th>#</th>
                <th>judul buku</th>
                <th>penulis</th>
                <th>harga</th>
                <th><a href="../buku/tambah_buku.php">Tambah Data</a></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1; //membuat penomoran data dari no 1
            //membuat variabel untuk menjalankan query SQL
            $query = $db->query("SELECT * FROM buku");

            //perulangan akan terus berjalan (menampilkan data) selama kondisi $query bernilai true
            while ($buku = $query->fetch_assoc()) {
                /* fungsi fetch_assoc digunakan untuk mengambil data perulangan dalam bentuk array */
                ?> <!--kode php di tutup untuk menyisipkan kode HTML yang akan di looping-->
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $buku['judulBuku'] ?></td>
                    <td><?php echo $buku['penulis'] ?></td>
                    <td><?php echo $buku['harga'] ?></td>
                
                <td align="center">
                    <!-- URL  ke halaman edit data dengan menggunakan parameter buku_id pada kolom table-->
                    <a href="../buku/edit_buku.php?buku_id=<?php echo $buku['buku_id']?>">Edit</a>

                    <!-- URL untuk menghapus data dengan menggunakan parameter buku_id pada kolom table dan alert konfirmasi hapus data-->
                    <a onclick="return confirm('Anda yakin ingin menghapus data?')" 
                    href="../buku/hapus_buku.php?buku_id=<?php echo $buku['buku_id'] ?>">Hapus</a>
                </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <!-- menghitung jumlah baris yang ada pada table (buku)-->
    <p>Total: <?php echo mysqli_num_rows($query) ?></p>
</body>
</html> 