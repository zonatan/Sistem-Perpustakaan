<?php
class Login extends Controller {

    public function index()
    {
        $data['error'] = '';
        $this->view('login/index', $data);
    }

    public function authenticate()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
    
            $pegawai = $this->model('Pegawai_model')->loginPegawai($username, $password);
    
            if ($pegawai) {
                // Set session data
                $_SESSION['user_id'] = $pegawai['id_pegawai'];
                $_SESSION['username'] = $pegawai['username'];
                $_SESSION['nama'] = $pegawai['nama'];
                $_SESSION['hak_akses'] = $pegawai['hak_akses'];
    
                header('Location: ' . BASEURL . '/buku'); 
                exit;
            } else {
                $data['error'] = 'Username atau password salah';
                $this->view('login/index', $data);
            }
        } else {
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    public function logout()
    {
        session_start(); 
        session_unset(); 
        session_destroy(); 
        
        header('Location: ' . BASEURL . '/login'); 
        exit;
    }

    
}
