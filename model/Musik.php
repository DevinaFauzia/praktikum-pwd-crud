<?php 
require_once 'Koneksi.php';

class Musik {
    public $db;
    public $table = "playlist";

    function __construct() {
        $this->db = new Koneksi();
    }

    function getAllMusik() {
        return $this->db->select($this->table);
    }

    function getMusikById($id) {
        return $this->db->find($this->table, $id);
    }

    function simpan($data) {
        return $this->db->insert($this->table, $data);
    }

    function update($data, $id) {
        return $this->db->update($this->table, $data, $id);
    }

    function hapus($id) {
        return $this->db->delete($this->table, $id);
    }
}
