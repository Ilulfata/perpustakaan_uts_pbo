<?php

require_once 'Buku.php';
require_once 'Anggota.php';

class Perpustakaan {
    private $daftarBuku = [];
    private $daftarAnggota = [];

    public function tambahBuku($buku) {
        $this->daftarBuku[] = $buku;
    }

    public function daftarBukuTersedia() {
        echo "Daftar Buku Tersedia:" . PHP_EOL;
        foreach ($this->daftarBuku as $buku) {
            if ($buku->getStatus() === "tersedia") {
                $buku->tampilkanInfoBuku();
                echo PHP_EOL;
            }
        }
    }

    public function tambahAnggota($anggota) {
        $this->daftarAnggota[] = $anggota;
    }

    public function pinjamBuku($nomorAnggota, $judulBuku) {
        foreach ($this->daftarAnggota as $anggota) {
            if ($anggota->getNomorAnggota() === $nomorAnggota) {
                foreach ($this->daftarBuku as $buku) {
                    if ($buku->getJudul() === $judulBuku && $buku->getStatus() === "tersedia") {
                        $anggota->pinjamBuku($buku);
                        $buku->setStatus("dipinjam");
                        echo "Buku '" . $judulBuku . "' berhasil dipinjam oleh anggota: " . $anggota->getNomorAnggota() . PHP_EOL;
                        echo PHP_EOL;
                        return;
                    }
                }
                echo "Buku '" . $judulBuku . "' tidak tersedia." . PHP_EOL;
                return;
            }
        }
        echo "Anggota dengan nomor " . $nomorAnggota . " tidak ditemukan." . PHP_EOL;
    }

    public function kembalikanBuku($nomorAnggota, $judulBuku) {
        foreach ($this->daftarAnggota as $anggota) {
            if ($anggota->getNomorAnggota() === $nomorAnggota) {
                foreach ($this->daftarBuku as $buku) {
                    if ($buku->getJudul() === $judulBuku && $buku->getStatus() === "dipinjam") {
                        $anggota->kembalikanBuku($buku);
                        $buku->setStatus("tersedia");
                        echo PHP_EOL;
                        echo "Buku '" . $judulBuku . "' berhasil dikembalikan." . PHP_EOL;
                        echo PHP_EOL;
                        return;
                    }
                }
                echo "Buku '" . $judulBuku . "' tidak ditemukan dalam daftar pinjaman." . PHP_EOL;
                return;
            }
        }
        echo "Anggota dengan nomor " . $nomorAnggota . " tidak ditemukan." . PHP_EOL;
    }

    public function tampilkanInfoSemuaAnggota() {
        echo "Informasi Semua Anggota Perpustakaan:" . PHP_EOL;
        foreach ($this->daftarAnggota as $anggota) {
            $anggota->tampilkanInfoAnggota();
        }
    }
}
