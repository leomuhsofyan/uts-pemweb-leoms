<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>
</head>

<body>
    <h1>Data produk</h1>
    <table border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama produk</th>
                <th>Harga</th>
                <th>Gambar produk</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require './config/db.php';

            $products = mysqli_query($db_connect, "SELECT * FROM products");
            $no = 1;

            while ($row = mysqli_fetch_assoc($products)) {
                ?>
                <tr>
                    <td>
                        <?= $no++; ?>
                    </td>
                    <td>
                        <?= $row['name']; ?>
                    </td>
                    <td>
                        <?= $row['price']; ?>
                    </td>
                    <!-- <td><img src="<?= $row['image']; ?>" width="100"></td> -->
                    <td><a href="<?= $row['image']; ?>" target="_blank">unduh</a></td>
                    <td>
                        <!-- Menambahkan fitur Edit dan Hapus -->
                        <a href="edit.php?id=<?= $row['id']; ?>">Edit</a>
                        <a href="delete.php?id=<?= $row['id']; ?>"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="create.php">tambah product</a>
</body>

</html>