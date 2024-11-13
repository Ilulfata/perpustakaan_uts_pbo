<?php

class Anggota {
    private $nama;
    private $nomorAnggota;
    private $alamat;
    private $daftarPinjaman = [];

    public function __construct($nama, $nomorAnggota, $alamat) {
        $this->nama = $nama;
        $this->nomorAnggota = $nomorAnggota;
        $this->alamat = $alamat;
    }

    public function tampilkanInfoAnggota() {
        echo "Nama: " . $this->nama . PHP_EOL;
        echo "Nomor Anggota: " . $this->nomorAnggota . PHP_EOL;
        echo "Alamat: " . $this->alamat . PHP_EOL;
        echo "Daftar Pinjaman: ";
        if (empty($this->daftarPinjaman)) {
            echo "Tidak ada buku yang dipinjam." . PHP_EOL;
        } else {
            foreach ($this->daftarPinjaman as $buku) {
                echo $buku->getJudul() . ", ";
            }
            echo PHP_EOL;
        }
    }

    public function getNomorAnggota() {
        return $this->nomorAnggota;
    }

    public function pinjamBuku($buku) {
        $this->daftarPinjaman[] = $buku;
    }

    public function kembalikanBuku($buku) {
        foreach ($this->daftarPinjaman as $key => $pinjaman) {
            if ($pinjaman->getJudul() === $buku->getJudul()) {
                unset($this->daftarPinjaman[$key]);
                break;
            }
        }
    }
}
