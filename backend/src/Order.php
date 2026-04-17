<?php
namespace App;

class Order {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($user_id, $total_amount, $status = 'pending') {
        $query = "INSERT INTO orders (user_id, total_amount, status) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);

        if ($stmt->execute([$user_id, $total_amount, $status])) {
            return ['success' => true, 'order_id' => $this->db->lastInsertId()];
        }

        return ['success' => false, 'message' => 'Order creation failed'];
    }

    public function getByUserId($user_id) {
        $query = "SELECT id, user_id, total_amount, status, created_at FROM orders WHERE user_id = ? ORDER BY created_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$user_id]);
        return $stmt->fetchAll();
    }

    public function getAll() {
        $query = "SELECT id, user_id, total_amount, status, created_at FROM orders ORDER BY created_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function updateStatus($order_id, $status) {
        $query = "UPDATE orders SET status = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);

        if ($stmt->execute([$status, $order_id])) {
            return ['success' => true];
        }

        return ['success' => false, 'message' => 'Status update failed'];
    }
}
?>
