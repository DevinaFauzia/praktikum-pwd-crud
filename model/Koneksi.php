<?php
class Koneksi {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "db_musik");

        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    public function select($table) {
        $stmt = $this->conn->prepare("SELECT * FROM `$table`");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insert($table, $data) {
        $fields = implode(", ", array_keys($data));
        $placeholders = rtrim(str_repeat("?, ", count($data)), ", ");
        $values = array_values($data);

        $stmt = $this->conn->prepare("INSERT INTO `$table` ($fields) VALUES ($placeholders)");

        $types = str_repeat("s", count($values));
        $stmt->bind_param($types, ...$values);

        return $stmt->execute();
    }

    public function update($table, $data, $id) {
        $updates = [];
        foreach ($data as $key => $value) {
            $updates[] = "$key=?";
        }

        $updateStr = implode(", ", $updates);
        $values = array_values($data);
        $values[] = $id;

        $stmt = $this->conn->prepare("UPDATE `$table` SET $updateStr WHERE id=?");

        $types = str_repeat("s", count($data)) . "i";
        $stmt->bind_param($types, ...$values);

        return $stmt->execute();
    }

    public function delete($table, $id) {
        $stmt = $this->conn->prepare("DELETE FROM `$table` WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function find($table, $id) {
        $stmt = $this->conn->prepare("SELECT * FROM `$table` WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getConnection() {
        return $this->conn;
    }
}


