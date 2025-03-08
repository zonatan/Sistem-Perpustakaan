<?php

class Member_model {
    private $table = 'member';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMember()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMemberById($id)
    {
        $this->db->query('SELECT * FROM member WHERE id_member = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
     
    public function tambahDataMember($data)
    {
        $query = "INSERT INTO member
                VALUES
                (:id_member, :nama, :alamat, :no_hp, :tanggal_daftar, :fakultas, :jurusan, :gambar_member)";

        $this->db->query($query);
        $this->db->bind('id_member', $data['id_member']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('no_hp', $data['no_hp']);
        $this->db->bind('tanggal_daftar', $data['tanggal_daftar']);
        $this->db->bind('fakultas', $data['fakultas']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('gambar_member', $data['gambar_member']);
       
        $this->db->execute();

        return $this->db->lastInsertId();
    }

    public function hapusDataMember($id)
    {
        try {
            $query = "DELETE FROM member WHERE id_member = :id_member";
            
            $this->db->query($query);
            $this->db->bind('id_member', $id);
            
            $this->db->execute();

            return $this->db->rowCount();
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $_SESSION['error_message'] = "tidak dapat dihapus karena masih memiliki transaksi peminjaman.";
            }
            return 0;
        }
    }

    public function ubahDataMember($data)
    {
        $query = "UPDATE member SET 
                    nama = :nama,
                    alamat = :alamat,
                    no_hp = :no_hp,
                    fakultas = :fakultas,
                    jurusan = :jurusan, 
                    gambar_member = :gambar_member
                  WHERE id_member = :id_member";

        $this->db->query($query);     
        $this->db->bind('id_member', $data['id_member']);     
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('no_hp', $data['no_hp']);
        $this->db->bind('fakultas', $data['fakultas']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('gambar_member', $data['gambar_member']);
        
        $this->db->execute();
        return $this->db->rowCount();
    }
    


    

    


}
