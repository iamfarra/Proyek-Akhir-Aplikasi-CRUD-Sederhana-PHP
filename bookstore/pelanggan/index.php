<?php

include("../koneksi.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>apk toko buku</title>
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

    <h2>Data pelanggan</h2>
    <?php if(isset($_SESSION['notifikasi'])): ?>
    <p><?php echo $_SESSION['notifikasi']; ?></p>
    
    <?php unset($_SESSION['notifikasi']); ?>
    <?php endif; ?>

    <table>
        <thead>
            <tr align="center">
                <th>#</th>
                <th>nama lengkap</th>
                <th>email</th>
                <th><a href="../pelanggan/tambah_pelanggan.php">Tambah Data</a></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = $db->query("SELECT * FROM pelanggan");
            while ($pelanggan = $query->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $pelanggan['nama'] ?></td>
                    <td><?php echo $pelanggan['email'] ?></td>
                
                <td align="center">
                    <a href="../pelanggan/edit_pelanggan.php?pelanggan_id=<?php echo $pelanggan['pelanggan_id']?>">Edit</a>
                    <a onclick="return confirm('Anda yakin ingin menghapus data?')" href="../pelanggan/hapus_pelanggan.php?pelanggan_id=<?php echo $pelanggan['pelanggan_id'] ?>">Hapus</a>
                </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <p>Total: <?php echo mysqli_num_rows($query) ?></p>
</body>
</html>