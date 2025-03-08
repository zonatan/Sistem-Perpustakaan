<?php

class Buku extends Controller {
    public function index()
    {
        $data['judul'] = 'Daftar Buku';
        $data['buku'] = $this->model('Buku_model')->getAllBuku();
       
        $this->view('tamplates/header', $data);
        $this->view('buku/index', $data);
        $this->view('tamplates/footer');
    }
    

    public function tambah()
    {
        if (!isset($_SESSION['hak_akses']) || $_SESSION['hak_akses'] !== 'admin') {
            header('Location: ' . BASEURL . '/buku'); 
            exit;
        }

        $data = $_POST;

        $gambar_sampul = $_FILES['gambar_sampul']['name'];
        $target_dir = "img/";
        $target_file = $target_dir . basename($gambar_sampul);

        if (move_uploaded_file($_FILES['gambar_sampul']['tmp_name'], $target_file)) {
            $data['gambar_sampul'] = $gambar_sampul;
        } else {
            $data['gambar_sampul'] = "default.jpg";
        }

        if ($this->model('Buku_model')->tambahBuku($data) > 0) {
            Flasher::setFlash('buku', 'berhasil ditambahkan', 'success');
        } else {
            Flasher::setFlash('buku', 'gagal ditambahkan', 'danger');
        }
        header('Location: ' . BASEURL . '/buku');
        exit;
    }


    public function hapus($id)
    {
        if ($this->model('Buku_model')->hapusDataBuku($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
        } else {
            if (isset($_SESSION['error_message'])) {
                Flasher::setFlash($_SESSION['error_message'], '', 'danger');
            } else {
                Flasher::setFlash('gagal', 'dihapus', 'danger');
            }
        }
        header('Location: ' . BASEURL . '/buku');
        exit;
    }



    public function ubah()
    {
        $data = $_POST;
        if (!empty($_FILES['gambar_sampul']['name'])) {
            $gambar_sampul = $_FILES['gambar_sampul']['name'];
            $target_dir = "img/";
            $target_file = $target_dir . basename($gambar_sampul);

            if (move_uploaded_file($_FILES['gambar_sampul']['tmp_name'], $target_file)) {
                $data['gambar_sampul'] = $gambar_sampul;

            } else {
                echo "Gagal mengunggah gambar.";
                return;
            }
        } else {
            $data['gambar_sampul'] = $_POST['gambar_sampul_lama'];
        }
        if ($this->model('Buku_model')->ubahBuku($data) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
        }
        header('Location: ' . BASEURL . '/buku');
        exit;
        }

}
