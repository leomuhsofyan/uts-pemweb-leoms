<?php
require './config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Hapus produk berdasarkan ID
    $deleteQuery = "DELETE FROM products WHERE id = $productId";
    $deleteResult = mysqli_query($db_connect, $deleteQuery);

    if ($deleteResult) {
        header("Location: show.php"); // Redirect kembali ke halaman utama setelah hapus
        exit();
    } else {
        echo "Gagal menghapus produk.";
        exit();
    }
} else {
    echo "Permintaan tidak valid.";
    exit();
}
?>
