<?php

class Peminjaman extends Controller {
    public function index()
    {
        $data['judul'] = 'Daftar Peminjaman';
        $this->view('tamplates/header', $data);
        $data['peminjaman'] = $this->model('Peminjaman_model')->getAllPeminjaman();
        $this->view('peminjaman/index', $data);
        $this->view('tamplates/footer');
    }

    public function tambah()
    {
        $idPeminjaman = $this->model('Peminjaman_model')->tambahDataPeminjaman($_POST);
    
        if ($idPeminjaman > 0) {
            $_SESSION['id_peminjaman'] = $idPeminjaman;
            header('Location: ' . BASEURL . '/peminjaman/success');
            exit;
        } else {
            $_SESSION['error'] = 'Gagal menambah peminjaman. Coba lagi.';
            header('Location: ' . BASEURL . '/peminjaman/form');
            exit;
        }
    }
    

    public function hapus($id_peminjaman)
    {
        if ($this->model('Peminjaman_model')->hapusDataPeminjaman($id_peminjaman) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
        } else{
            Flasher::setFlash('gagal', 'dihapus', 'danger');
        }
        header('Location: ' . BASEURL . '/peminjaman/bukumasuk');
        exit;
    }

    public function form() {

    
        $data['judul'] = 'Form Peminjaman';
        
        $data['buku'] = $this->model('Buku_model')->getAllBuku();
        $data['member'] = $this->model('Member_model')->getAllMember();
        $data['pegawai'] = $this->model('Pegawai_model')->getAllPegawai();
        $data['peminjaman'] = $this->model('Peminjaman_model')->getAllPeminjaman();
        $this->view('tamplates/header', $data);
        $this->view('peminjaman/form', $data);
        $this->view('tamplates/footer');
    }

    public function bukuMasuk() {
        $data['judul'] = 'Riwayat';
        $data['peminjaman'] = $this->model('Peminjaman_model')->getAllBukuMasuk();
        
        $this->view('tamplates/header', $data);
        $this->view('peminjaman/bukumasuk', $data);
        $this->view('tamplates/footer');
    }

}
