<?php
include 'koneksi.php';
session_start();
if (!$_SESSION['username']){
    header('location: login.php');
    exit();
}

$sql = "SELECT * FROM produks";
$result = $mysqli->query($sql);

function formatRupiah($angka) {
    $rupiah = "Rp " . number_format($angka, 0, ',', '.');
    return $rupiah;
}

if ($result->num_rows > 0) {
    echo "<html>";
    echo "<head>";
    echo "<style>";
    echo "body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 8px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #0066cc;
            color: #fff;
            text-align: center;
        }

        a {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background-color: #0066cc;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        a:hover {
            background-color: #004080;
        }";
    echo "</style>";
    echo "</head>";
    echo "<body>";

    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Jenis PS</th><th>Warna</th><th>Harga Perjam</th><th>Action</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["ps_id"]."</td>";
        echo "<td>".$row["jenis_ps"]."</td>";
        echo "<td>".$row["warna"]."</td>";
        echo "<td>".formatRupiah($row["harga_perjam"])."</td>";
        echo "<td><a href='update.php?id=".$row["ps_id"]."'>Edit</a> | <a href='delete.php?id=".$row["ps_id"]."'>Hapus</a></td>";
        echo "</tr>";
    }

    echo "</table>";

    echo "<a href='create_produk.php'>Tambah</a>";
    echo "<a href='index.php'>Kembali</a>";

    echo "</body>";
    echo "</html>";
} else {
    echo "Tidak ada data produk.";
}

$mysqli->close();
?>
