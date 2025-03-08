<?php

class Daftar extends Controller {

    public function index()
    {
        $this->view('daftar/index');
    }

    public function form()
    {
        $this->view('daftar/form');
    }



    public function tambahPublic()
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

        header('Location: ' . BASEURL . '/daftar/detailPublic/' . $newMemberId);
    } else {
        Flasher::setFlash('member', 'gagal ditambahkan', 'danger');
        header('Location: ' . BASEURL . '/daftar');
    }
    exit;
    }

    public function detailPublic($id)
    {
        $data['judul'] = 'Detail Member';
        $data['member'] = $this->model('Member_model')->getMemberById($id);
        $this->view('daftar/detailPublic', $data);
    }





}