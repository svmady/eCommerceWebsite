<?php
namespace App;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Auth {
    private $secret;

    public function __construct($secret) {
        $this->secret = $secret;
    }

    public function generateToken($data) {
        $payload = array(
            'iat' => time(),
            'exp' => time() + (86400 * 30), // 30 days
            'data' => $data
        );

        return JWT::encode($payload, $this->secret, 'HS256');
    }

    public function verifyToken($token) {
        try {
            $decoded = JWT::decode($token, new Key($this->secret, 'HS256'));
            return $decoded->data;
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getTokenFromHeader() {
        $headers = getallheaders();
        if (isset($headers['Authorization'])) {
            $auth_header = $headers['Authorization'];
            if (preg_match('/Bearer (.*)/', $auth_header, $matches)) {
                return $matches[1];
            }
        }
        return null;
    }
}
?>
