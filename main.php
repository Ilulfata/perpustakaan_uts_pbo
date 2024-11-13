<?php

echo "\n\n";
echo "=====================================\n\n";
echo "Nama: Muhammad Emilul Fata\n";
echo "NIM: 32602300005\n\n";
echo "=====================================\n\n";

require_once 'Buku.php';
require_once 'Anggota.php';
require_once 'Perpustakaan.php';

$perpustakaan = new Perpustakaan();

$buku1 = new Buku("Cara Memasak Untuk Pemula", "Arno Sutero", 1945, "123456789");
$buku2 = new Buku("Tutorial Memancing Ikan", "Ulka Tafa", 2004, "987654321");
$perpustakaan->tambahBuku($buku1);
$perpustakaan->tambahBuku($buku2);

$anggota1 = new Anggota("Argus", "001", "Jl. Pertama No. 1");
$perpustakaan->tambahAnggota($anggota1);

$perpustakaan->daftarBukuTersedia();

$perpustakaan->pinjamBuku("001", "Cara Memasak Untuk Pemula");

$perpustakaan->daftarBukuTersedia();

$perpustakaan->tampilkanInfoSemuaAnggota();

$perpustakaan->kembalikanBuku("001", "Cara Memasak Untuk Pemula");

$perpustakaan->daftarBukuTersedia();

$perpustakaan->tampilkanInfoSemuaAnggota();
