<?php

class Buku_model {
    private $table = 'buku';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

   
    private function generateBookId() {
        $prefix = "BK";
        $lastId = "";

        $this->db->query("SELECT id_buku FROM " . $this->table . " ORDER BY id_buku DESC LIMIT 1");
        $result = $this->db->single();

        if ($result) {
            $lastId = $result['id_buku'];
        } else {
            $lastId = "BK0000"; 
        }

        $number = (int) substr($lastId, strlen($prefix));
        $newNumber = str_pad($number + 1, 4, '0', STR_PAD_LEFT);

        return $prefix . $newNumber;
    }

    
    public function getAllBuku()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function tambahBuku($data)
    {
        //ID buku otomatis
        $data['id_buku'] = $this->generateBookId();

        $query = "INSERT INTO buku
                VALUES
                (:id_buku, :judul, :kategori, :penerbit, :tahun, :gambar_sampul)";

        $this->db->query($query);
        $this->db->bind('id_buku', $data['id_buku']);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('kategori', $data['kategori']);
        $this->db->bind('penerbit', $data['penerbit']);
        $this->db->bind('tahun', $data['tahun']);
        $this->db->bind('gambar_sampul', $data['gambar_sampul']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataBuku($id)
        {
            try{
                $query = "DELETE FROM buku WHERE id_buku = :id_buku";
                
                $this->db->query($query);
                $this->db->bind('id_buku', $id);
                
                $this->db->execute();

                return $this->db->rowCount();
            }catch (PDOException $e) {
                if ($e->getCode() == 23000) {
                    $_SESSION['error_message'] = "tidak dapat dihapus karena masih memiliki transaksi peminjaman.";
                }
                return 0;
            }
        }

    public function ubahBuku($data)
    {
    $query = "UPDATE buku SET 
                judul = :judul, 
                kategori = :kategori, 
                penerbit = :penerbit, 
                tahun = :tahun, 
                gambar_sampul = :gambar_sampul
              WHERE id_buku = :id_buku";

    $this->db->query($query);
    $this->db->bind('id_buku', $data['id_buku']);
    $this->db->bind('judul', $data['judul']);
    $this->db->bind('kategori', $data['kategori']);
    $this->db->bind('penerbit', $data['penerbit']);
    $this->db->bind('tahun', $data['tahun']);
    $this->db->bind('gambar_sampul', $data['gambar_sampul']);

    $this->db->execute();

    return $this->db->rowCount();
    }


}
