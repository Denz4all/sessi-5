<?php
require_once "koneksi.php";

$sql = "SELECT * FROM tb_buku";
$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
</head>
<body>

    <h2>Data Buku</h2>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>No</th>
            <th>ID Buku</th>
            <th>Judul Buku</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Qty</th>
        </tr>

        <?php
        $no = 1;

        while ($data = mysqli_fetch_assoc($query)) {
        ?>

        <tr>
            <td><?= $no++; ?></td>
            <td><?= htmlspecialchars($data['id_buku']); ?></td>
            <td><?= htmlspecialchars($data['judul_buku']); ?></td>
            <td><?= htmlspecialchars($data['pengarang_buku']); ?></td>
            <td><?= htmlspecialchars($data['penerbit_buku']); ?></td>
            <td><?= htmlspecialchars($data['tahun_terbit']); ?></td>
            <td><?= htmlspecialchars($data['qty']); ?></td>
        </tr>

        <?php
        }
        ?>

    </table>

    <br>
    <a href="form.html">Input Data Buku</a>

</body>
</html>

<?php
mysqli_free_result($query);
mysqli_close($conn);
?>