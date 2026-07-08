<?php
declare(strict_types=1);
header('Content-Type: application/json');

require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/db-connect.php';

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $response['message'] = 'Invalid request method.';
    jsonResponse($response);
}

// Get JSON input
$input = json_decode(file_get_contents('php://input'), true);

$name = htmlspecialchars(trim($input['name'] ?? ''));
$email = filter_var(trim($input['email'] ?? ''), FILTER_VALIDATE_EMAIL);
$message = htmlspecialchars(trim($input['message'] ?? ''));

if (!$name || !$email || !$message) {
    $response['message'] = 'Please fill in all fields correctly.';
    jsonResponse($response);
}

// Insert into Supabase
$success = $supabase->insert('contacts', [
    'name' => $name,
    'email' => $email,
    'message' => $message
]);

if ($success) {
    $response['success'] = true;
    $response['message'] = 'Thank you. We will contact you shortly.';
} else {
    $response['message'] = 'Unable to process your request. Please try again.';
}

jsonResponse($response);