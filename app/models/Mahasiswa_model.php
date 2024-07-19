<?php

class Mahasiswa_model
{
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function getAllMahasiswa()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswa($id)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function addMahasiswa($data)
    {
        // Cek apakah nim sudah ada
        $this->db->query("SELECT id FROM mahasiswa WHERE nim=:nim");
        $this->db->bind('nim', $data['nim']);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            return ['status' => 'error', 'message' => 'NIM sudah digunakan oleh mahasiswa lain'];
        }

        // Cek apakah email sudah ada
        $this->db->query("SELECT id FROM mahasiswa WHERE email=:email");
        $this->db->bind('email', $data['email']);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            return ['status' => 'error', 'message' => 'Email sudah digunakan oleh mahasiswa lain'];
        }

        // Insert data mahasiswa baru
        $this->db->query("INSERT INTO mahasiswa (nama, nim, email, jurusan) VALUES (:nama, :nim, :email, :jurusan)");
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->execute();
        return $this->db->rowCount();
    }


    public function delMahasiswa($id)
    {
        $this->db->query("DELETE FROM mahasiswa WHERE id=:id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getUpdateMahasiswa($id)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function updateMahasiswa($id, $data)
    {
        // Cek apakah nim sudah ada
        $this->db->query("SELECT id FROM mahasiswa WHERE nim=:nim AND id!=:id");
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('id', $id);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            return ['status' => 'error', 'message' => 'NIM sudah digunakan oleh mahasiswa lain'];
        }

        // Cek apakah email sudah ada
        $this->db->query("SELECT id FROM mahasiswa WHERE email=:email AND id!=:id");
        $this->db->bind('email', $data['email']);
        $this->db->bind('id', $id);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            return ['status' => 'error', 'message' => 'Email sudah digunakan oleh mahasiswa lain'];
        }

        // Update data mahasiswa
        $this->db->query("UPDATE mahasiswa SET nama=:nama, nim=:nim, email=:email, jurusan=:jurusan WHERE id=:id");
        $this->db->bind('id', $id);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function searchMahasiswa($keyword) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE nama LIKE :keyword");
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
    
}