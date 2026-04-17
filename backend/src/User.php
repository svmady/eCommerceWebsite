<?php
namespace App;

class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function register($email, $password, $name) {
        // Check if user exists
        $query = "SELECT id FROM users WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$email]);

        if ($stmt->rowCount() > 0) {
            return ['success' => false, 'message' => 'User already exists'];
        }

        // Hash password and insert
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO users (email, password, name) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);

        if ($stmt->execute([$email, $hashed_password, $name])) {
            return ['success' => true, 'message' => 'User registered successfully'];
        }

        return ['success' => false, 'message' => 'Registration failed'];
    }

    public function login($email, $password) {
        $query = "SELECT id, email, password, name FROM users WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$email]);

        if ($stmt->rowCount() === 0) {
            return ['success' => false, 'message' => 'User not found'];
        }

        $user = $stmt->fetch();

        if (!password_verify($password, $user['password'])) {
            return ['success' => false, 'message' => 'Invalid password'];
        }

        return [
            'success' => true,
            'message' => 'Login successful',
            'user' => [
                'id' => $user['id'],
                'email' => $user['email'],
                'name' => $user['name']
            ]
        ];
    }
}
?>
