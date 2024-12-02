<?php

include("../koneksi.php");
$pelanggan_id = $_GET['pelanggan_id'];

$query = $db->query("SELECT * FROM pelanggan WHERE pelanggan_id = '$pelanggan_id'");
$pelanggan = $query->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Edit Pelanggan</h2>
    <form action="../pelanggan/proses_edit.php" method="POST">
        <input type="hidden" name="pelanggan_id" value="<?php echo $pelanggan['pelanggan_id']; ?>">
        <table border="0">
            <tr>
                <td>Nama Lengkap</td>
                <td><input type="text" name="nama"
                value="<?php echo $pelanggan['nama']; ?>" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email"
                value="<?php echo $pelanggan['email']; ?>" required></td>
            </tr>
        </table>
        <button type="submit" name="simpan">simpan</button>
    </form>
</body>
</html>
