<?php
include("../koneksi.php");
//mengambil ID buku dari parameter URL
$buku = $_GET['buku_id'];

//mengambil data buku dari database berdasarkan ID
$query = $db->query("SELECT * FROM buku WHERE buku_id = '$buku'");
$buku = $query->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Edit Buku</h2>
    <form action="../buku/proses_edit.php" method="POST">
        <input type="hidden" name="buku_id" value="<?php echo $buku['buku_id']; ?>">
        <table border="0">
            <tr>
                <td>Judul Buku</td>
                <td><input type="text" name="judulBuku"
                value="<?php echo $buku['judulBuku']; ?>" required></td>
            </tr>
            <tr>
                <td>Penulis</td>
                <td><input type="text" name="penulis"
                value="<?php echo $buku['penulis']; ?>" required></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="number" name="harga"
                value="<?php echo $buku['harga']; ?>"></td>
            </tr>
        </table>
        <button type="submit" name="simpan">simpan</button>
    </form>
</body>
</html>
