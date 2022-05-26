<?php
error_reporting(E_ALL);
include_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $kategori = $_POST['kategori'];
  $harga_jual = $_POST['harga_jual'];
  $harga_beli = $_POST['harga_beli'];
  $stok = $_POST['stok'];
  $file_gambar = $_FILES['file_gambar'];
  $gambar = null;
  if ($file_gambar['error'] == 0) {
    $filename = str_replace(' ', '_', $file_gambar['name']);
    $destination = dirname(__FILE__) . '/gambar/' . $filename;
    if (move_uploaded_file($file_gambar['tmp_name'], $destination)) {
      $gambar =  $filename;;
    }
  }
  $sql = 'INSERT INTO data_barang (nama, kategori,harga_jual, harga_beli, stok, gambar) ';
  $sql .= "VALUE ('{$nama}', '{$kategori}','{$harga_jual}', '{$harga_beli}', '{$stok}', '{$gambar}')";
  $result = mysqli_query($conn, $sql);

  header('location: index.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link href="style.css" rel="stylesheet" type="text/css" />
  <title>Tambah Barang</title>
  <style>
    * {
      padding: 0;
      margin: 0;
    }

    body {
      font-family: 'Times New Roman', Times, serif;
    }

    .container {
      width: 350px;
      background: grey;
      margin: 50px auto;
      padding: 20px 20px;
      border-radius: 20px;
      box-shadow: 5px 15px 35px #1b1d1c;
    }

    h1 {
      text-align: center;
      text-transform: uppercase;
    }

    hr {
      margin-top: 10px;
      margin-bottom: 20px;
    }

    .nama {
      box-sizing: border-box;
      width: 100%;
      padding: 10px;
      font-size: 11pt;
      margin-bottom: 20px;
      margin-top: 10px;
      border-radius: 20px;
    }

    .kirim {
      background: #1b1d1c;
      color: white;
      font-size: 11pt;
      width: 100%;
      border: none;
      padding: 10px 20px;
      margin-top: 10px;
      border-radius: 20px;
    }

    .kirim:hover {
      background: rgb(34, 35, 25);
      cursor: pointer;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Tambah Barang</h1>
    <hr>
    <div class="main">
      <form method="post" action="tambah.php" enctype="multipart/form-data">
        <div class="input">
          <label>Nama Barang</label>
          <br>
          <input class="nama" type="text" name="nama" placeholder="Nama Barang..." />
        </div>

        <div class="input">
          <label>Kategori</label>
          <br>
          <select class="nama" name="kategori">
            <option value="Komputer">Komputer</option>
            <option value="Elektronik">Elektronik</option>
            <option value="Hand Phone">Hand Phone</option>
          </select>
        </div>

        <div class="input">
          <label>Harga Jual</label>
          <br>
          <input class="nama" type="text" name="harga_jual" placeholder="Rp........" />
        </div>

        <div class="input">
          <label>Harga Beli</label>
          <br>
          <input class="nama" type="text" name="harga_beli" placeholder="Rp........" />
        </div>

        <div class="input">
          <label>Stok</label>
          <br>
          <input class="nama" type="text" name="stok" placeholder="Stok Barang....." />
        </div>

        <div class="input">
          <label>File Gambar</label>

          <input type="file" name="file_gambar" />
        </div>

        <div class="submit">
          <input class="kirim" type="submit" name="submit" value="Simpan" />
        </div>

      </form>
    </div>
  </div>
</body>

</html>