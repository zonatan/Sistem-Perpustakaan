<?php

class Peminjaman_model {
    private $table = 'peminjaman';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    private function generatePeminjamanId() {
        $prefix = "PJ";
        $lastId = "";

        $this->db->query("SELECT id_peminjaman FROM " . $this->table . " ORDER BY id_peminjaman DESC LIMIT 1");
        $result = $this->db->single();

        if ($result) {
            $lastId = $result['id_peminjaman'];
        } else {
            $lastId = "PJ0000";
        }

        $number = (int) substr($lastId, strlen($prefix));
        $newNumber = str_pad($number + 1, 4, '0', STR_PAD_LEFT);

        return $prefix . $newNumber;
    }

    public function getAllPeminjaman()
    {

        $query = "SELECT 
                    peminjaman.*, 
                    buku1.judul AS judul_buku,
                    buku2.judul AS judul_buku_2, 
                    buku3.judul AS judul_buku_3,
                    member.nama AS nama_member, 
                    pegawai.nama AS nama_pegawai
                  FROM peminjaman
                  LEFT JOIN buku AS buku1 ON peminjaman.id_buku = buku1.id_buku
                  LEFT JOIN buku AS buku2 ON peminjaman.id_buku_2 = buku2.id_buku
                  LEFT JOIN buku AS buku3 ON peminjaman.id_buku_3 = buku3.id_buku
                  INNER JOIN member ON peminjaman.id_member = member.id_member
                  INNER JOIN pegawai ON peminjaman.id_pegawai = pegawai.id_pegawai
                  WHERE peminjaman.status = :status";
    
        $this->db->query($query);
        $this->db->bind(':status', 'dipinjam');
        $peminjamanList = $this->db->resultSet();
    
        foreach ($peminjamanList as &$peminjaman) {
            if ($peminjaman['status'] === 'dipinjam') {
                $denda = $this->hitungDendaHarian($peminjaman['id_peminjaman']);
                $peminjaman['denda'] = $denda;
    
                // Update denda di database
                $this->db->query("UPDATE " . $this->table . " SET denda = :denda WHERE id_peminjaman = :id_peminjaman");
                $this->db->bind('denda', $denda);
                $this->db->bind('id_peminjaman', $peminjaman['id_peminjaman']);
                $this->db->execute();
            } else {
                $peminjaman['denda'] = 0;
            }
        }
    
        return $peminjamanList;
    }
    
    

    public function tambahDataPeminjaman($data)
    {
        $data['id_peminjaman'] = $this->generatePeminjamanId();
    
        if (!isset($data['status'])) {
            $data['status'] = 'dipinjam';
        }
    
        $query = "INSERT INTO peminjaman
                  VALUES
                  (:id_peminjaman, :id_buku, :id_buku_2, :id_buku_3, :id_member, :id_pegawai, :tanggal_pinjam, :status, :denda)";
    
        $this->db->query($query);
        $this->db->bind('id_peminjaman', $data['id_peminjaman']);
        $this->db->bind('id_buku', $data['id_buku']);
        $this->db->bind('id_buku_2', $data['id_buku_2']);
        $this->db->bind('id_buku_3', $data['id_buku_3']);
        $this->db->bind('id_member', $data['id_member']);
        $this->db->bind('id_pegawai', $data['id_pegawai']);
        $this->db->bind('tanggal_pinjam', $data['tanggal_pinjam']);
        $this->db->bind('status', $data['status']);
        $this->db->bind('denda', $data['denda']);
    
        $this->db->execute();
    
        if ($this->db->rowCount() > 0) {
            return $data['id_peminjaman'];
        }
    
        return 0;
    }

    public function cariPeminjamanById($id_peminjaman) {
        $query = "SELECT 
                    peminjaman.*, 
                    buku1.judul AS judul_buku,
                    buku2.judul AS judul_buku_2, 
                    buku3.judul AS judul_buku_3,
                    member.nama AS nama_member, 
                    pegawai.nama AS nama_pegawai
                  FROM peminjaman
                  LEFT JOIN buku AS buku1 ON peminjaman.id_buku = buku1.id_buku
                  LEFT JOIN buku AS buku2 ON peminjaman.id_buku_2 = buku2.id_buku
                  LEFT JOIN buku AS buku3 ON peminjaman.id_buku_3 = buku3.id_buku
                  INNER JOIN member ON peminjaman.id_member = member.id_member
                  INNER JOIN pegawai ON peminjaman.id_pegawai = pegawai.id_pegawai
                  WHERE peminjaman.id_peminjaman = :id_peminjaman";
    
        $this->db->query($query);
        $this->db->bind(':id_peminjaman', $id_peminjaman);
    
        return $this->db->single();
    }


    public function hapusDataPeminjaman($id_peminjaman)
    {
        $query = "DELETE FROM peminjaman WHERE id_peminjaman = :id_peminjaman";

        $this->db->query($query);
        $this->db->bind('id_peminjaman', $id_peminjaman);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function kembalikanBuku($id_peminjaman)
    {
        $denda = $this->hitungDendaHarian($id_peminjaman);

        $query = "UPDATE peminjaman SET status = 'dikembalikan', denda = :denda WHERE id_peminjaman = :id_peminjaman";
        $this->db->query($query);
        $this->db->bind('id_peminjaman', $id_peminjaman);
        $this->db->bind('denda', $denda);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getAllBukuMasuk()
    {
        $query = "SELECT 
                    peminjaman.*, 
                    buku1.judul AS judul_buku,
                    buku2.judul AS judul_buku_2, 
                    buku3.judul AS judul_buku_3,
                    member.nama AS nama_member, 
                    pegawai.nama AS nama_pegawai
                FROM peminjaman
                LEFT JOIN buku AS buku1 ON peminjaman.id_buku = buku1.id_buku
                LEFT JOIN buku AS buku2 ON peminjaman.id_buku_2 = buku2.id_buku
                LEFT JOIN buku AS buku3 ON peminjaman.id_buku_3 = buku3.id_buku
                INNER JOIN member ON peminjaman.id_member = member.id_member
                INNER JOIN pegawai ON peminjaman.id_pegawai = pegawai.id_pegawai
                WHERE peminjaman.status = 'dikembalikan'";

        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function hitungDendaHarian($id_peminjaman)
    {
        $this->db->query("SELECT tanggal_pinjam, id_buku, id_buku_2, id_buku_3 FROM " . $this->table . " WHERE id_peminjaman = :id_peminjaman");
        $this->db->bind('id_peminjaman', $id_peminjaman);
        $data = $this->db->single();

        if ($data) {
            $tanggalPinjam = new DateTime($data['tanggal_pinjam']);
            $tanggalPinjam = new DateTime($tanggalPinjam->format('Y-m-d'));
            $tanggalHariIni = new DateTime(); // Hari ini

            $batasHariBebasDenda = 7;
            $dendaPerHariPerBuku = 5000;

            $jumlahBuku = 0;
            if (!empty($data['id_buku'])) $jumlahBuku++;
            if (!empty($data['id_buku_2'])) $jumlahBuku++;
            if (!empty($data['id_buku_3'])) $jumlahBuku++;

            $selisihHari = $tanggalPinjam->diff($tanggalHariIni)->days;
            $hariTerlambat = max(0, $selisihHari - $batasHariBebasDenda);

            $denda = $hariTerlambat * $dendaPerHariPerBuku * $jumlahBuku;

            return $denda;
        } else {
            return 0;
        }
    }


    

    


}
