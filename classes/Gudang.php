<?php
class Gudang {
    private $conn;
    private $table_name = "gudang";

    public $id;
    public $name;
    public $location;
    public $capacity;
    public $status;
    public $opening_hour;
    public $closing_hour;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Read semua Gudang
    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Create new Gudang
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (name, location, capacity, status, opening_hour, closing_hour)
                  VALUES (:name, :location, :capacity, :status, :opening_hour, :closing_hour)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":location", $this->location);
        $stmt->bindParam(":capacity", $this->capacity);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":opening_hour", $this->opening_hour);
        $stmt->bindParam(":closing_hour", $this->closing_hour);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Update Gudang
    public function update() {
        $query = "UPDATE " . $this->table_name . " 
                  SET name = :name, location = :location, capacity = :capacity, status = :status, 
                      opening_hour = :opening_hour, closing_hour = :closing_hour 
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":location", $this->location);
        $stmt->bindParam(":capacity", $this->capacity);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":opening_hour", $this->opening_hour);
        $stmt->bindParam(":closing_hour", $this->closing_hour);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Delete Gudang (set status ke tidak_aktif)
    public function delete() {
        $query = "UPDATE " . $this->table_name . " SET status = 'tidak_aktif' WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
