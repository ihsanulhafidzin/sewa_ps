<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: grey;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #0066cc;
            color: #fff;
            cursor: pointer;
        }

        a.back-to-index {
            display: block;
            background-color: #0066cc;
            color: #fff;
            cursor: pointer;
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
        }

        input[type="submit"]:hover,
        a.back-to-index:hover {
            background-color: #004080;
        }
    </style>
</head>
<body>
<?php
include 'koneksi.php';
session_start();
if (!$_SESSION['username']){
    header('location: login.php');
    exit();
}
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Your existing PHP code here
}
?>
<form action="#" method="POST">
    ID: <input type="text" name="ps_id"><br>
    Jenis PS: <input type="text" name="jenis_ps"><br>
    Warna: <input type="text" name="warna"><br>
    Harga Perjam: <input type="text" name="harga_perjam" onkeyup="formatCurrency(this)" required><br>
    <input type="submit" value="Tambah">
    <a href="index.php" class="back-to-index">Kembali</a>
</form>

<script>
    // Your existing JavaScript code here
</script>
</body>
</html>
