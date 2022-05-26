<?php
include("koneksi.php");
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <h1>Data Barang</h1>
    <a class="tambah" href="tambah.php">Tambah Barang</a>
    <div class="main">
      <table>
        <tr>
          <th>No</th>
          <th>Gambar</th>
          <th>Nama Barang</th>
          <th>Kategori</th>
          <th>Harga Jual</th>
          <th>Harga Beli</th>
          <th>Stok</th>
          <th>Aksi</th>
        </tr>

        <?php
        if ($result) :
        ?>
          <?php
          $nomor = 1;
          while ($row = mysqli_fetch_array($result)) :
          ?>
            <tr>
              <td style="text-align: center;"><?php echo $nomor++; ?></td>
              <!-- <td><?= $row['id_barang']; ?></td> -->
              <td><img src="gambar/<?= $row['gambar']; ?>" alt="<?= $row['nama']; ?>" width="100">
              <td><?= $row['nama']; ?></td>
              <td><?= $row['kategori']; ?></td>
              <td><?= "Rp. " . $row['harga_jual']; ?></td>
              <td><?= "Rp. " . $row['harga_beli']; ?>
              </td>
              <td><?= $row['stok']; ?></td>
              <td>
                <a class="ubah" href="ubah.php?id_barang=<?php echo $row['id_barang']; ?>">Edit</a>
                <a class="hapus" href="hapus.php?id_barang=<?php echo $row['id_barang']; ?>">Hapus</a>
              </td>

            </tr>
          <?php endwhile;
        else : ?>
          <tr>
            <td colspan="7">Belum ada data</td>
          </tr>
        <?php endif; ?>

      </table>
    </div>
  </div>
</body>

</html>