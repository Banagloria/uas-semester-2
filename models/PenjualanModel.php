<?php

class PenjualanModel {

    private $table = "penjualan";
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllPenjualan() {
        $this->db->query("SELECT penjualan.*, kategori.nama_kategori FROM " . $this->table . " JOIN kategori ON kategori.nama_kategori = penjualan.kategori_nama");
        return $this->db->resultSet();
    }

    public function tambahPenjualan($data) {
                                $this->db->query("INSERT INTO penjualan (nama_barang, kategori_nama, jumlah_terjual, harga_satuan, total) 
            VALUES (:nama_barang, :kategori_nama, :jumlah_terjual, :harga_satuan, :total)");
        $this->db->bind('nama_barang', $data['nama_barang']);
        $this->db->bind('kategori_nama', $data['kategori_nama']);
        $this->db->bind('jumlah_terjual', $data['jumlah_terjual']);
        $this->db->bind('harga_satuan', $data['harga_satuan']);
        $this->db->bind('total', $data['jumlah_terjual'] * $data['harga_satuan']);
        $this->db->execute();

        return $this->db->rowCount();
    }


    public function getPenjualanById($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    

    public function updatePenjualan($data) {
        $this->db->query("UPDATE penjualan SET nama_barang=:nama_barang, `kategori_nama`=:kategori_nama, jumlah_terjual=:jumlah_terjual, harga_satuan=:harga_satuan, total=:total WHERE id=:id");
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_barang', $data['nama_barang']);
        $this->db->bind('kategori_nama', $data['kategori_nama']);
        $this->db->bind('jumlah_terjual', $data['jumlah_terjual']);
        $this->db->bind('harga_satuan', $data['harga_satuan']);
        $this->db->bind('total', $data['jumlah_terjual'] * $data['harga_satuan']);
        $this->db->execute();
    
        return $this->db->rowCount();
    }
    
    public function cariPenjualan() {
        $key = $_POST['key'];
        $this->db->query("SELECT * FROM " . $this->table . " WHERE nama_barang LIKE :key 
                          OR kategori_nama LIKE :key 
                          OR jumlah_terjual LIKE :key 
                          OR harga_satuan LIKE :key 
                          OR total LIKE :key");
        $this->db->bind(':key', "%$key%", PDO::PARAM_STR);
        return $this->db->resultSet();
    }
    

    public function deletePenjualan($id){
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id',$id);
        $this->db->execute();
    
        return $this->db->rowCount();
    }


    
    



}



?>
