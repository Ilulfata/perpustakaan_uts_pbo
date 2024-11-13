<?php

class Buku {
    private $judul;
    private $pengarang;
    private $tahunTerbit;
    private $ISBN;
    private $status = "tersedia";

    public function __construct($judul, $pengarang, $tahunTerbit, $ISBN) {
        $this->judul = $judul;
        $this->pengarang = $pengarang;
        $this->tahunTerbit = $tahunTerbit;
        $this->ISBN = $ISBN;
    }

    public function tampilkanInfoBuku() {
        echo "Judul: " . $this->judul . PHP_EOL;
        echo "Pengarang: " . $this->pengarang . PHP_EOL;
        echo "Tahun Terbit: " . $this->tahunTerbit . PHP_EOL;
        echo "ISBN: " . $this->ISBN . PHP_EOL;
        echo "Status: " . $this->status . PHP_EOL;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getJudul() {
        return $this->judul;
    }

    public function getStatus() {
        return $this->status;
    }
}
