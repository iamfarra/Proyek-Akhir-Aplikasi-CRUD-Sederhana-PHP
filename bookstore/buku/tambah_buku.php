<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>apk toko buku</title>
</head>
<body>
    <h3>Tambah Data b uku</h3>
    <form action="../buku/proses_tambah.php" method="POST">
        <table border="0">
            <tr>
                <td>Judul Buku</td>
                <td><input type="text" name="judulBuku" required></td>
            </tr>
            <tr>
                 <td>Penulis</td>
                <td><input type="text" name="penulis" required></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="number" name="harga"></td>
            </tr>
        </table>
        <button type=""submit name="simpan">Simpan</button>
    </form>
</body>
</html>