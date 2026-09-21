<?php
require_once "products.php";
require_once "functions.php";

$totalNilaiStok = hitungTotalNilaiStok($products);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Manajemen Data Informasi Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 10px 12px;
            text-align: left;
        }
        .badge-kritis {
            font-weight: bold;
        }
        .ringkasan {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h1>Sistem Manajemen Data Informasi Produk</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $produk): ?>
                <tr class="<?= isStokKritis($produk["stok"]) ? "stok-kritis" : "" ?>">
                    <td><?= $produk["id"] ?></td>
                    <td><?= $produk["nama"] ?></td>
                    <td><?= $produk["kategori"] ?></td>
                    <td><?= formatRupiah($produk["harga"]) ?></td>
                    <td>
                        <?= $produk["stok"] ?>
                        <?php if (isStokKritis($produk["stok"])): ?>
                            <span class="badge-kritis">(Kritis)</span>
                        <?php endif; ?>
                    </td>
                    <td><?= $produk["deskripsi"] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="ringkasan">
        Total Nilai Aset Gudang: <?= formatRupiah($totalNilaiStok) ?>
    </div>

</body>
</html>
