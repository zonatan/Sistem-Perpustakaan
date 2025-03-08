<?php

class Pegawai extends Controller {
    public function index()
    {
        $data['judul'] = 'Daftar Pegawai';
        
        $data['pegawai'] = $this->model('Pegawai_model')->getAllPegawai();
        $this->view('pegawai/index', $data);
        $this->view('tamplates/header', $data);
        $this->view('tamplates/footer');
    }

    public function tambah()
    {
        if (!isset($_SESSION['hak_akses']) || $_SESSION['hak_akses'] !== 'admin') {
            header('Location: ' . BASEURL . '/pegawai');
            exit;
        }

        $data = $_POST;

        $gambar = $_FILES['gambar_pegawai']['name'];
        $target_dir = "img/pegawai/";
        $target_file = $target_dir . basename($gambar);

       
        if (move_uploaded_file($_FILES['gambar_pegawai']['tmp_name'], $target_file)) {
            $data['gambar_pegawai'] = $gambar;
        } else {
            $data['gambar_pegawai'] = "default.jpg";
        }

        if ($this->model('Pegawai_model')->tambahDataPegawai($data) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pegawai');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pegawai');
            exit;
        }
    }



    



}