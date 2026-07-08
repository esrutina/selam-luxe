<?php
declare(strict_types=1);

// Suppress deprecation warnings
error_reporting(E_ALL & ~E_DEPRECATED);
ini_set('display_errors', '0');

header('Content-Type: application/json');

// Read environment variables directly
$supabaseUrl = $_ENV['SUPABASE_URL'] ?? getenv('SUPABASE_URL') ?? '';
$supabaseKey = $_ENV['SUPABASE_ANON_KEY'] ?? getenv('SUPABASE_ANON_KEY') ?? '';

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit;
}

// Get JSON input
$input = json_decode(file_get_contents('php://input'), true);

$name = htmlspecialchars(trim($input['name'] ?? ''));
$email = filter_var(trim($input['email'] ?? ''), FILTER_VALIDATE_EMAIL);
$message = htmlspecialchars(trim($input['message'] ?? ''));

if (!$name || !$email || !$message) {
    echo json_encode(['success' => false, 'message' => 'Please fill in all fields correctly.']);
    exit;
}

// Send to Supabase REST API directly
$url = $supabaseUrl . '/rest/v1/contacts';

$data = [
    'name' => $name,
    'email' => $email,
    'message' => $message
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'apikey: ' . $supabaseKey,
    'Authorization: Bearer ' . $supabaseKey,
    'Content-Type: application/json',
    'Prefer: return=minimal'
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if ($httpCode === 201) {
    echo json_encode([
        'success' => true,
        'message' => 'Thank you. We will contact you shortly.'
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Unable to process your request. Please try again.'
    ]);
}