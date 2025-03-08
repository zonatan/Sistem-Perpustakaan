<?php

class Member extends Controller {
    public function index()
    {
        $data['judul'] = 'Daftar Member';
        $this->view('tamplates/header', $data);
        $data['member'] = $this->model('Member_model')->getAllMember();
        $this->view('member/index', $data);
        $this->view('tamplates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Member';
        $data['member'] = $this->model('Member_model')->getMemberById($id);
        $this->view('tamplates/header', $data);
        $this->view('member/detail', $data);
        $this->view('tamplates/footer');
    }
    
    public function tambah()
    {
    $data = $_POST;

    $gambar_member = $_FILES['gambar_member']['name'];
    $target_dir = "img/member/";
    $target_file = $target_dir . basename($gambar_member);

    if (move_uploaded_file($_FILES['gambar_member']['tmp_name'], $target_file)) {
        $data['gambar_member'] = $gambar_member;
    } else {
        $data['gambar_member'] = "default.jpg";
    }

    $newMemberId = $this->model('Member_model')->tambahDataMember($data);
    if ($newMemberId > 0) {
        Flasher::setFlash('member', 'berhasil ditambahkan', 'success');

        header('Location: ' . BASEURL . '/member/detail/' . $newMemberId);
    } else {
        Flasher::setFlash('member', 'gagal ditambahkan', 'danger');
        header('Location: ' . BASEURL . '/member');
    }
    exit;
    }


    public function hapus($id)
    {
        if ($this->model('Member_model')->hapusDataMember($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
        } else {
            if (isset($_SESSION['error_message'])) {
                Flasher::setFlash($_SESSION['error_message'], '', 'danger');
                unset($_SESSION['error_message']); 
            } else {
                Flasher::setFlash('gagal', 'dihapus', 'danger');
            }
        }
        header('Location: ' . BASEURL . '/member');
        exit;
    }

        public function ubah()
    {
        $data = $_POST;
        $target_dir = "img/member/";

        if (!empty($_FILES['gambar_member']['name'])) {
            $gambar_member = $_FILES['gambar_member']['name'];
            $target_file = $target_dir . basename($gambar_member);

            if (move_uploaded_file($_FILES['gambar_member']['tmp_name'], $target_file)) {
                $data['gambar_member'] = $gambar_member;

                if ($_POST['gambar_member_lama'] && $_POST['gambar_member_lama'] != $gambar_member) {
                    $gambar_lama = $target_dir . $_POST['gambar_member_lama'];
                    if (file_exists($gambar_lama)) {
                        unlink($gambar_lama); // Menghapus gambar lama dari server
                    }
                }
            } else {
                echo "Gagal mengunggah gambar.";
                return;
            }
        } else {
            $data['gambar_member'] = $_POST['gambar_member_lama'];
        }

        if ($this->model('Member_model')->ubahDataMember($data) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
        }
        header('Location: ' . BASEURL . '/member/detail/' . $data['id_member']);
        exit;
    }

    
    public function getBiodata()
    {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_member = $_POST['id_member'];
        $member = $this->model('Member_model')->getMemberById($id_member);
        echo json_encode($member);
    }
}




}