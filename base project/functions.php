<?php
// fungsi-fungsi untuk ngolah data produk

// hitung total nilai stok semua produk (harga x stok)
function hitungTotalNilaiStok($products) {
    $total = 0;
    foreach ($products as $produk) {
        $total += $produk["harga"] * $produk["stok"];
    }
    return $total;
}

// cek apakah stok kritis (kurang dari 3)
function isStokKritis($stok) {
    if ($stok < 3) {
        return true;
    }
    return false;
}

// format angka jadi rupiah
function formatRupiah($angka) {
    return "Rp " . number_format($angka, 0, ",", ".");
}
