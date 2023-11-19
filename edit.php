<?php
require './config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Mengambil data produk berdasarkan ID
    $query = "SELECT * FROM products WHERE id = $productId";
    $result = mysqli_query($db_connect, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
    } else {
        echo "Produk tidak ditemukan.";
        exit();
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Memproses data yang dikirim dari form edit
    $productId = $_POST['id'];
    $productName = $_POST['name'];
    $productPrice = $_POST['price'];

    // Melakukan update data produk
    $updateQuery = "UPDATE products SET name = '$productName', price = '$productPrice' WHERE id = $productId";
    $updateResult = mysqli_query($db_connect, $updateQuery);

    if ($updateResult) {
        header("Location: show.php"); // Redirect kembali ke halaman utama setelah edit
        exit();
    } else {
        echo "Gagal melakukan pengeditan produk.";
        exit();
    }
} else {
    echo "Permintaan tidak valid.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
</head>
<body>
    <h1>Edit Produk</h1>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?=$product['id'];?>">
        <label for="name">Nama Produk:</label>
        <input type="text" id="name" name="name" value="<?=$product['name'];?>" required><br><br>

        <label for="price">Harga:</label>
        <input type="text" id="price" name="price" value="<?=$product['price'];?>" required><br><br>

        <input type="submit" value="Simpan">
    </form>
</body>
</html>
