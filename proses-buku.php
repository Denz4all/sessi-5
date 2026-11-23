<?php
require_once "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST["judul"];
    $pengarang = $_POST["pengarang"];
    $penerbit = $_POST["penerbit"];
    $tahun_terbit = $_POST["tahun_terbit"];
    $qty = $_POST["qty"];

    $sql = "INSERT INTO tb_buku
            (judul_buku, pengarang_buku, penerbit_buku, tahun_terbit, qty)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "ssssi",
        $judul,
        $pengarang,
        $penerbit,
        $tahun_terbit,
        $qty
    );

    if (mysqli_stmt_execute($stmt)) {
        echo "<h2>Data buku berhasil disimpan!</h2>";
        echo "<a href='form.html'>Input Buku Lagi</a><br>";
        echo "<a href='form-buku.php'>Lihat Data Buku</a>";
    } else {
        echo "Gagal menyimpan data buku: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
} else {
    header("Location: form.html");
    exit;
}

mysqli_close($conn);
?>