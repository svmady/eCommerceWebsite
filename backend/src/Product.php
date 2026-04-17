<?php
namespace App;

class Product {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $query = "SELECT id, name, description, price, stock, image_url FROM products";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $query = "SELECT id, name, description, price, stock, image_url FROM products WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($name, $description, $price, $stock) {
        $query = "INSERT INTO products (name, description, price, stock) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);

        if ($stmt->execute([$name, $description, $price, $stock])) {
            return ['success' => true, 'id' => $this->db->lastInsertId()];
        }

        return ['success' => false, 'message' => 'Product creation failed'];
    }

    public function update($id, $name, $description, $price, $stock) {
        $query = "UPDATE products SET name = ?, description = ?, price = ?, stock = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);

        if ($stmt->execute([$name, $description, $price, $stock, $id])) {
            return ['success' => true];
        }

        return ['success' => false, 'message' => 'Update failed'];
    }

    public function delete($id) {
        $query = "DELETE FROM products WHERE id = ?";
        $stmt = $this->db->prepare($query);

        if ($stmt->execute([$id])) {
            return ['success' => true];
        }

        return ['success' => false, 'message' => 'Delete failed'];
    }
}
?>
