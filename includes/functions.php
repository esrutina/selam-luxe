<?php
declare(strict_types=1);

/**
 * Selam Luxe — Helper Functions
 */

/**
 * Safely escape HTML output
 */
function e(string $text): string {
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

/**
 * Format price with Ethiopian Birr
 */
function formatPrice(float $price): string {
    return 'ETB ' . number_format($price);
}

/**
 * Get CSRF token for forms
 */
function csrfToken(): string {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Check if request is AJAX
 */
function isAjax(): bool {
    return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
           strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
}

/**
 * Send JSON response
 */
function jsonResponse(array $data): void {
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}