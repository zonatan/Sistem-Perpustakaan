<?php

class Pengembalian extends Controller {
    public function index()
    {
        $data['judul'] = 'Pengembalian';
        $this->view('tamplates/header', $data);
        $data['pengembalian'] = $this->model('Peminjaman_model')->getAllPeminjaman();
        $this->view('pengembalian/index', $data);
        $this->view('tamplates/footer');
    }

    public function kembalikan($id_peminjaman)
    {
        if ($this->model('Peminjaman_model')->kembalikanBuku($id_peminjaman) > 0) {
            Flasher::setFlash('Buku berhasil', 'dikembalikan', 'success');
            header('Location: ' . BASEURL . '/pengembalian');
            exit;
        }
    }

    public function cari()
        {
            $data['judul'] = 'Pengembalian';
            $data['detail_peminjaman'] = null;

            if (isset($_POST['id_peminjaman']) && !empty($_POST['id_peminjaman'])) {
                $id_peminjaman = $_POST['id_peminjaman'];
                
                $data['detail_peminjaman'] = $this->model('Peminjaman_model')->cariPeminjamanById($id_peminjaman);
                
                if (!$data['detail_peminjaman']) {
                    $data['error'] = "Data tidak ditemukan untuk ID peminjaman tersebut.";
                }
            }

            $this->view('tamplates/header', $data);
            $this->view('pengembalian/index', $data);
            $this->view('tamplates/footer');
        }

    
}
