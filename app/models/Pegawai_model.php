<?php

class Pegawai_model {
    private $table = 'pegawai';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPegawai()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function tambahDataPegawai($data)
    {
        $hashedPassword = md5($data['password']);

        $query = "INSERT INTO pegawai
                  VALUES
                  ('', :nama, :username, :password, :hak_akses, :gambar_pegawai)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $hashedPassword); 
        $this->db->bind('hak_akses', $data['hak_akses']);
        $this->db->bind('gambar_pegawai', $data['gambar_pegawai']);
        
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function loginPegawai($username, $password)
    {
        $hashedPassword = md5($password);

        $this->db->query("SELECT * FROM pegawai WHERE username = :username AND password = :password");
        $this->db->bind('username', $username);
        $this->db->bind('password', $hashedPassword);
        
        $pegawai = $this->db->single();

        return $pegawai ? $pegawai : false;
    }



}