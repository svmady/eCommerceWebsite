<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Load environment variables
$env = parse_ini_file(__DIR__ . '/../.env');
if (!$env) {
    $env = parse_ini_file(__DIR__ . '/../.env.example');
}

// Database connection
try {
    $db = new PDO(
        'mysql:host=' . $env['DB_HOST'] . ';dbname=' . $env['DB_NAME'],
        $env['DB_USER'],
        $env['DB_PASSWORD'],
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed']);
    exit;
}

// Parse request
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request_uri = str_replace('/api', '', $request_uri);
$parts = explode('/', trim($request_uri, '/'));
$method = $_SERVER['REQUEST_METHOD'];

// Route handling
$response = ['status' => 'not_found'];
http_response_code(404);

// Auth routes
if ($parts[0] === 'auth') {
    if ($parts[1] === 'login' && $method === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        $response = ['status' => 'success', 'message' => 'Login endpoint'];
    } elseif ($parts[1] === 'signup' && $method === 'POST') {
        $response = ['status' => 'success', 'message' => 'Signup endpoint'];
    }
}

// Product routes
elseif ($parts[0] === 'products') {
    if ($method === 'GET') {
        $response = ['status' => 'success', 'message' => 'Get products endpoint'];
    }
}

// Cart routes
elseif ($parts[0] === 'cart') {
    if ($method === 'GET') {
        $response = ['status' => 'success', 'message' => 'Get cart endpoint'];
    } elseif ($method === 'POST') {
        $response = ['status' => 'success', 'message' => 'Add to cart endpoint'];
    }
}

// Order routes
elseif ($parts[0] === 'orders') {
    if ($method === 'GET') {
        $response = ['status' => 'success', 'message' => 'Get orders endpoint'];
    } elseif ($method === 'POST') {
        $response = ['status' => 'success', 'message' => 'Create order endpoint'];
    }
}

echo json_encode($response);
?>
